<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageInfo extends Model
{
    use HasFactory;

    protected $table = 'page_information';

    protected $fillable = [
        'page_id',
        'info'
    ];
}
