<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $title = "Carzex - User";

        // Add your admin dashboard logic here
        return view('admin.user.index', ['title' => $title]);
    }

    public function add()
    {

        $title = "Carzex - Add User";

        // Add your admin dashboard logic here
        return view('admin.user.add', ['title' => $title]);
    }

    public function edit()
    {

        $title = "Carzex - Edit User";

        // Add your admin dashboard logic here
        return view('admin.user.edit', ['title' => $title]);
    }

    public function delete()
    {

    }
}
