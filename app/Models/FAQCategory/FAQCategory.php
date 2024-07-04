<?php

namespace App\Models\FAQCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;

    protected $table = 'faqs_categories';

    protected $fillable = [
        'name',
        'order',
        'status',
    ];
}
