<?php

namespace App\Models\ProductOption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $table = "product_options";

    protected $fillabe = [
        'name',
        'is_required'
    ];
}
