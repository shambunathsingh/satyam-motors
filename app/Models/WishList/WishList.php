<?php

namespace App\Models\WishList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'customer_id',
        'product_id'
    ];
}
