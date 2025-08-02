<?php

namespace App\Http\Controllers;

use App\Models\ProductExchange;
use App\Models\Sales;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductExchangeController extends Controller
{
    public function __construct()
    {
        //Protect with auth or role-based middleware
        $this->middleware('auth');
    }

    // Display all exchanges
    public function index()
    {
        $exchanges = ProductExchange::with([
            'user',
            'sale.product.purchase',
            'newProduct.purchase'
        ])->latest()->get();
        $title = 'Exchanges';
        return view('product_exchanges.index', compact('exchanges', 'title'));
    }

    // Select sale for initiating exchange
    public function selectSale()
    {
        // Only fetch sales with quantity > 0
        $sales = Sales::where('quantity', '>', 0)->with('product.purchase')->get();
        $title = 'Select Sale';
        return view('product_exchanges.select-sale', compact('sales', 'title'));
    }

    // Show form for exchange request
    public function create($sale_id)
    {
        $sale = Sales::findOrFail($sale_id);

        $products = Product::with('purchase')
            ->whereHas('purchase', function ($q) {
                $q->where('quantity', '>', 0);
            })
            ->where('id', '!=', $sale->product_id)
            ->get();

        $title = 'Create Exchange';
        return view('product_exchanges.create', compact('sale', 'products', 'title'));
    }



    // Store exchange request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'new_product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string',
        ]);

        $sale = Sales::findOrFail($validated['sale_id']);

        if ($validated['quantity'] > $sale->quantity) {
            return back()->withErrors(['quantity' => 'The exchange quantity cannot exceed the sold quantity of ' . $sale->quantity . '.']);
        }

        $newProduct = Product::findOrFail($validated['new_product_id']);
        $newProductPurchase = $newProduct->purchase;

        if (!$newProductPurchase || $newProductPurchase->quantity < $validated['quantity']) {
            return back()->withErrors(['new_product_id' => 'The selected product does not have enough stock.']);
        }

        // Calculate unit price and deduct
        $unitPrice = $sale->quantity > 0 ? $sale->total_price / $sale->quantity : 0;
        $deductAmount = $unitPrice * $validated['quantity'];

        // Update sale
        $sale->quantity -= $validated['quantity'];
        $sale->total_price -= $deductAmount;
        $sale->save();

        // Restock returned product
        $oldProductPurchase = $sale->product->purchase;
        if ($oldProductPurchase) {
            $oldProductPurchase->quantity += $validated['quantity'];
            $oldProductPurchase->save();
        }

        // Deduct new product stock
        $newProductPurchase->quantity -= $validated['quantity'];
        $newProductPurchase->save();

        // Create product exchange
        ProductExchange::create([
            'user_id' => auth()->id(),
            'sale_id' => $validated['sale_id'],
            'new_product_id' => $validated['new_product_id'],
            'quantity' => $validated['quantity'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->route('product_exchanges.index')->with('success', 'Product exchange request created successfully.');
    }

    // Update exchange request (only if pending)
    public function update(Request $request, $id)
    {
        $exchange = ProductExchange::findOrFail($id);

        if ($exchange->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending exchanges can be updated.');
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string',
            'new_product_id' => 'required|exists:products,id',
        ]);

        $sale = Sales::findOrFail($exchange->sale_id);

        if ($validated['quantity'] > $sale->quantity + $exchange->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Exchange quantity cannot exceed available sale quantity.']);
        }

        $oldQuantity = $exchange->quantity;
        $oldNewProductId = $exchange->new_product_id;

        // Roll back previous sale adjustment
        $previousUnitPrice = ($sale->quantity + $oldQuantity) > 0
            ? ($sale->total_price + ($sale->product->purchase->price * $oldQuantity)) / ($sale->quantity + $oldQuantity)
            : 0;

        $sale->quantity += $oldQuantity;
        $sale->total_price += $previousUnitPrice * $oldQuantity;

        // Roll back previous stock changes
        $oldNewProduct = Product::find($oldNewProductId);
        if ($oldNewProduct && $oldNewProduct->purchase) {
            $oldNewProduct->purchase->quantity += $oldQuantity;
            $oldNewProduct->purchase->save();
        }

        $sale->save();

        $purchase = $sale->product->purchase;
        if ($purchase) {
            $purchase->quantity -= $oldQuantity; // subtract rollback to keep consistent
            $purchase->save();
        }

        $newProduct = Product::findOrFail($validated['new_product_id']);
        $newProductPurchase = $newProduct->purchase;

        if (!$newProductPurchase || $newProductPurchase->quantity < $validated['quantity']) {
            return redirect()->back()->withErrors(['new_product_id' => 'Selected new product does not have enough stock.']);
        }

        $unitPrice = $sale->quantity > 0 ? $sale->total_price / $sale->quantity : 0;
        $deductAmount = $unitPrice * $validated['quantity'];

        $sale->quantity -= $validated['quantity'];
        $sale->total_price -= $deductAmount;
        $sale->save();

        // Adjust stock
        $purchase->quantity += $validated['quantity']; // returning old product
        $purchase->save();

        $newProductPurchase->quantity -= $validated['quantity'];
        $newProductPurchase->save();

        // Update exchange
        $exchange->quantity = $validated['quantity'];
        $exchange->reason = $validated['reason'];
        $exchange->new_product_id = $validated['new_product_id'];
        $exchange->save();

        return redirect()->route('product_exchanges.index')->with('success', 'Exchange request updated successfully.');
    }

    // Approve the exchange request
    public function approve(Request $request, $id)
    {
        $exchange = ProductExchange::findOrFail($id);

        if ($exchange->status !== 'pending') {
            return back()->withErrors(['status' => 'Only pending exchanges can be approved.']);
        }

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update the exchange status to approved
        $exchange->status = $validated['status'];
        $exchange->save();

        // Adjust sale quantity and total price
        if ($validated['status'] === 'approved') {
            $sale = Sales::find($exchange->sale_id);

            if ($sale && $sale->quantity >= $exchange->quantity) {
                $unitPrice = $sale->quantity > 0 ? $sale->total_price / $sale->quantity : 0;
                $deductAmount = $unitPrice * $exchange->quantity;

                $sale->total_price -= $deductAmount;
                $sale->quantity -= $exchange->quantity;
                $sale->save();

                // Update purchase stock
                $purchase = $sale->product->purchase ?? null;

                if ($purchase) {
                    $purchase->quantity += $exchange->quantity;
                    $purchase->save();
                }
            }
        }

        return redirect()->route('product_exchanges.index')->with('success', 'Exchange request approved successfully.');
    }

    // Reject the exchange request
    public function reject(Request $request, $id)
    {
        $exchange = ProductExchange::findOrFail($id);

        if ($exchange->status !== 'pending') {
            return back()->withErrors(['status' => 'Only pending exchanges can be rejected.']);
        }

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update the exchange status to rejected
        $exchange->status = $validated['status'];
        $exchange->save();

        // Restore sale quantity and total price
        $sale = Sales::find($exchange->sale_id);
        $quantity = $exchange->quantity;

        if ($sale) {
            $unitPrice = $sale->quantity > 0 ? $sale->total_price / $sale->quantity : 0;
            $sale->quantity += $quantity;
            $sale->total_price += $unitPrice * $quantity;
            $sale->save();
        }

        // Restore stock of the original product
        if ($sale && $sale->product->purchase) {
            $sale->product->purchase->quantity -= $quantity;
            $sale->product->purchase->save();
        }

        // Restore stock of the new exchanged product
        if ($exchange->newProduct && $exchange->newProduct->purchase) {
            $exchange->newProduct->purchase->quantity += $quantity;
            $exchange->newProduct->purchase->save();
        }

        return redirect()->route('product_exchanges.index')->with('success', 'Exchange request rejected successfully.');
    }
}
