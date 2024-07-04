<?php

namespace App\Models\FAQ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'cat_id',
        'question',
        'answer',
        'status',
    ];
}
