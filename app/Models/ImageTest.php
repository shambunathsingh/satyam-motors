<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTest extends Model
{
    use HasFactory;

    protected $table = 'image_test';

    protected $fillable = [
        'single',
        'multiple',
    ];
}
