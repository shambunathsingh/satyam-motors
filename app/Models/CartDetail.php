<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\Models\Customer\Customer;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
