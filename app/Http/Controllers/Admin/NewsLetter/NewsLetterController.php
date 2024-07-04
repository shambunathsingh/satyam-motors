<?php

namespace App\Http\Controllers\Admin\NewsLetter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function index()
    {
        $title = "Carzex - Newsletters";


        // Return the view with the categories data
        return view('admin.news.index', ['title' => $title]);
    }
}
