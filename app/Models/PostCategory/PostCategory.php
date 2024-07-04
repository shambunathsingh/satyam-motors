<?php

namespace App\Models\PostCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'is_default',
        'icon',
        'order',
        'is_featured',
        'status',
    ];
}
