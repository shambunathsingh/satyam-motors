<?php

namespace App\Http\Controllers\Admin\ProductOptions;

use App\Http\Controllers\Controller;
use App\Models\ProductOption\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    public function store_product_option(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'is_required' => '',
        ]);

        $poption = new ProductOption();
        $poption->name = $request->name;
        $poption->is_required = $request->is_required;

        $poption->save();


        return redirect()->back()->with('success', 'Option created successfully.');
    }

    public function update_product_option(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'is_required' => '',
        ]);

        $poption = ProductOption::findOrFail($id);
        $poption->name = $request->name;
        $poption->is_required = $request->is_required;

        $poption->save();


        return redirect()->back()->with('success', 'Option updated successfully.');
    }

    public function delete_product_option($id)
    {

        $poption = ProductOption::findOrFail($id);

        $poption->delete();


        return redirect()->back()->with('success', 'Option deleted successfully.');
    }
}
