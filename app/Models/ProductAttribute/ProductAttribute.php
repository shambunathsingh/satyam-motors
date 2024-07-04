<?php

namespace App\Models\ProductAttribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';

    protected $fillable = [
        'title',
        'slug',
        'use_image_from_product_variation',
        'status',
        'display_layout',
        'is_searchable',
        'is_comparable',
        'is_use_in_product_listing',
        'order',
    ];
}
