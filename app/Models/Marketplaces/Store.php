<?php

namespace App\Models\Marketplaces;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'country', 'state', 'city', 
        'customer_id', 'logo', 'description', 'content', 'status', 
        'vendor_verified_at', 'zip_code', 'company'
    ];

    protected $dates = ['vendor_verified_at', 'created_at', 'updated_at'];
}
