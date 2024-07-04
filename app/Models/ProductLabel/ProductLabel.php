<?php

namespace App\Models\ProductLabel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    use HasFactory;

    protected $table = 'product_labels';

    protected $fillable = [
        'name',
        'color',
        'status',
    ];
}
