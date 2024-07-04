<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $title = "Carzex - Dashboard";

        // Add your admin dashboard logic here
        return view('admin.dashboard', ['title' => $title]);
    }
    public function test()
    {

        $title = "Testing Page";

        // Add your admin dashboard logic here
        return view('admin.test', ['title' => $title]);
    }
}
