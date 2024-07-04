<?php

namespace App\Models\flash_sale_products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flash_sales\Flash_sales;

class flash_sale_products extends Model
{
    use HasFactory;

    protected $table = 'flash_sale_products';

    protected $fillable = [
        'flash_sale_id',
        'product_id',
        'price',
        'quantity',
        'sold',
        'updated_at',
        'created_at'
    ];
    public function flashSale()
    {
        return $this->belongsTo(Flash_sales::class, 'flash_sale_id');
    }
}
