<?php

namespace App\Http\Controllers;

use App\Models\ReturnRequest;
use App\Models\Sales;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    // Show the list of return requests
    public function index()
    {
        $returns = ReturnRequest::with('sale.product.purchase', 'user')
            ->orderBy('created_at', 'desc')->get();
        $title = 'Returns';
        return view('returns.index', compact('returns', 'title'));
    }


    // Show the form for creating a new return request
    public function create($sale_id)
    {
        $sale = Sales::findOrFail($sale_id);
        $title = 'Create Return';
        return view('returns.create', compact('sale', 'title'));
    }

    // Store a new return request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'reason' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the sale details to check available quantity
        $sale = Sales::findOrFail($validated['sale_id']);

        // Check if the requested return quantity is more than the available quantity
        if ($validated['quantity'] > $sale->quantity) {
            return back()->withErrors(['quantity' => 'The return quantity cannot exceed the available quantity of ' . $sale->quantity . '.']);
        }

        // Create the return request with the validated data
        ReturnRequest::create([
            'user_id' => auth()->id(),
            'sale_id' => $validated['sale_id'],
            'reason' => $validated['reason'],
            'quantity' => $validated['quantity'],
            'status' => 'pending',
        ]);

        return redirect()->route('returns.index')->with('success', 'Return request submitted.');
    }

    // Approve or reject the return request
    public function update(Request $request, $id)
    {
        $return = ReturnRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $return->status = $validated['status'];
        $return->save();

        if ($validated['status'] === 'approved') {
            $sale = Sales::find($return->sale_id);

            if ($sale && $sale->quantity >= $return->quantity) {
                $unitPrice = $sale->quantity > 0 ? $sale->total_price / $sale->quantity : 0;
                $deductAmount = $unitPrice * $return->quantity;

                $sale->total_price -= $deductAmount;
                $sale->quantity -= $return->quantity;
                $sale->save();

                // Update purchase stock
                $purchase = $sale->product->purchase ?? null;

                if ($purchase) {
                    $purchase->quantity += $return->quantity;
                    $purchase->save();
                }
            }
        }

        return redirect()->route('returns.index')->with('success', 'Return request updated successfully.');
    }

    public function __construct()
    {
        $this->middleware('permission:view-returns')->only('index');
        $this->middleware('permission:create-return')->only('create', 'store');
        $this->middleware('permission:update-return')->only('edit', 'update');
    }

    public function selectSale()
    {
        $sales = Sales::with('product')->latest()->get();
        $title = 'Select Sale';
        return view('returns.select-sale', compact('sales', 'title'));
    }
}
