<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sale_id',
        'new_product_id',
        'quantity',
        'reason',
        'status',
    ];

    // The user who requested the exchange
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The original sale involved in the exchange
    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id')->withTrashed();
    }

    // The new product requested in exchange
    public function newProduct()
    {
        return $this->belongsTo(Product::class, 'new_product_id')->withTrashed();
    }
}
