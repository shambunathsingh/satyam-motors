<?php

namespace App\Models\PostTag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
