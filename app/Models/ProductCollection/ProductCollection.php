<?php

namespace App\Models\ProductCollection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    use HasFactory;

    protected $table = 'product_collections';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'image',
        'featured',
    ];
}
