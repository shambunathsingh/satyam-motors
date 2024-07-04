<?php

namespace App\Models\ProductDiscount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $table = 'product_discounts';

    protected $fillable = [
        'code',
        'title',
        'discount_type',
        'can_use_with_promotion',
        'is_unlimited',
        'quantity',
        'type_option',
        'value',
        'target',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'unlimited_time',
    ];
}
