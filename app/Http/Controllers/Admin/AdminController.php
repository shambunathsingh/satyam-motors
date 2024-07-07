<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brands;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $title = "Satyam Motors | Dashboard";

        $allproducts = Product::count();
        $allbrands = Brands::count();
        $allcategories = Category::count();

        $categories = Category::all();

        // dd($allproducts, $allbrands, $allcategories);
        // exit;

        // Add your admin dashboard logic here
        return view('admin.dashboard', [
            'title' => $title,
            'productCount' => $allproducts,
            'brandCount' => $allbrands,
            'categoryCount' => $allcategories,
            'categories' => $categories,
        ]);
    }
    public function test()
    {

        $title = "Testing Page";

        // Add your admin dashboard logic here
        return view('admin.test', ['title' => $title]);
    }
}
