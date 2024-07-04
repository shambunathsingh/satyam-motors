<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'name',
        'description',
        'is_featured',
        'content',
        'time_to_read',
        'layout',
        'status',
        'categories',
        'image',
        'tag',
    ];
}
