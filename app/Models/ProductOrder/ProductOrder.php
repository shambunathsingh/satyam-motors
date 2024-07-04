<?php

namespace App\Models\ProductOrder;

use App\Models\Order\Order;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $table = "p_orders";

    protected $fillabe = [
        'order_id',
        'product_id',
        'quantity',
        'subtotal',
        'is_paid',
        'coupon',
        'payment_method',
        'payment_id',
        'order_token',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
