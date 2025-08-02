<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',  // The sale ID referencing the sales table
        'user_id',
        'reason',
        'status',
        'quantity',
    ];

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id'); // Link to the Sale model
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'returns';
}
