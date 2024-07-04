<?php

namespace App\Models\ProductFeature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    use HasFactory;

    protected $table = 'product_features';

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];
}
