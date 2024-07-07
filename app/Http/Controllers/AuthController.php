<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the admin dashboard route
            return redirect()->route('admin.dashboard');
        }

        return redirect('admin/login')->withErrors('Invalid details');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        // Save in user table

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // login user here
        if (Auth::attempt($request->only('email', 'password'))) {
            $title = "Carzex - Dashboard";

            // Add your admin dashboard logic here
            return redirect()->route('admin.dashboard');
        }

        return redirect('admin/register')->withErrors('Error');
    }

    public function home()
    {
        $title = "Carzex - Dashboard";

        // Add your admin dashboard logic here
        return view('admin.dashboard', ['title' => $title]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        // return redirect('auth.login');
        return redirect()->route('login');
    }
}
