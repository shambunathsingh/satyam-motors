<?php

namespace App\Models\Flash_sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\flash_sale_products\flash_sale_products;

class Flash_sales extends Model
{
    use HasFactory;

    protected $table = 'flash_sales';

    protected $fillable = [
        'name',
        'subtitle',
        'end_date',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'end_date',
        'created_at',
        'updated_at'
    ];
    // Define the relationship with flash_sale_products
    public function products()
    {
        return $this->hasMany(flash_sale_products::class, 'flash_sale_id');
    }
}
