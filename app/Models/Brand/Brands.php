<?php

namespace App\Models\Brand;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $fillable = [
        'name',
        'icon',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
