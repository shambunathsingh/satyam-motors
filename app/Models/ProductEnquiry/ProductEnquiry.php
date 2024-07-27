<?php

namespace App\Models\ProductEnquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $table = 'product_enquiry';

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'mssg',
    ];
}
