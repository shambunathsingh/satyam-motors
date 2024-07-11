<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtProductImage extends Model
{
    use HasFactory;

    protected $table = 'exterior_product_images';

    protected $fillable = [
        'product_id',
        'images',
    ];
}
