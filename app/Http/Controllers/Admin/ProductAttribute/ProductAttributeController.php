<?php

namespace App\Http\Controllers\Admin\ProductAttribute;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{

    public function create_product_attributes()
    {
        $title = "Carzex - New Product Attributes";


        return view('admin.ecommerce.add_product_attribute', ['title' => $title]);
    }

    public function store_product_attributes(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'slug' => '',
            'use_image_from_product_variation' => '',
            'status' => '',
            'display_layout' => '',
            'is_searchable' => '',
            'is_comparable' => '',
            'is_use_in_product_listing' => '',
            'order' => '',
        ]);


        $pattribute = new ProductAttribute();
        $pattribute->title = $request->title;
        $pattribute->slug = $request->slug;
        $pattribute->use_image_from_product_variation = $request->use_image_from_product_variation;
        $pattribute->status = $request->status;
        $pattribute->display_layout = $request->display_layout;
        $pattribute->is_searchable = $request->is_searchable;
        $pattribute->is_comparable = $request->is_comparable;
        $pattribute->is_use_in_product_listing = $request->is_use_in_product_listing;
        $pattribute->order = $request->order;

        // Check if image file is present
        // if ($request->hasFile('images')) {
        //     $logo = $request->file('images');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/product_attributes', $logoName);
        //     $pattribute->images = $logoName;
        // }


        $pattribute->save();

        return redirect()->back()->with('success', 'Product attribute created successfully.');
    }

    public function edit_product_attributes($id)
    {

        $title = "Carzex - Edit Product Attributes";

        $pattribute = ProductAttribute::findOrFail($id);

        return view('admin.ecommerce.edit_product_attribute', ['title' => $title, 'pattribute' => $pattribute]);
    }


    public function update_product_attributes(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'slug' => '',
            'use_image_from_product_variation' => '',
            'status' => '',
            'display_layout' => '',
            'is_searchable' => '',
            'is_comparable' => '',
            'is_use_in_product_listing' => '',
            'order' => '',
        ]);


        $pattribute = ProductAttribute::findOrFail($id);

        $pattribute->title = $request->title;
        $pattribute->slug = $request->slug;
        $pattribute->use_image_from_product_variation = $request->use_image_from_product_variation;
        $pattribute->status = $request->status;
        $pattribute->display_layout = $request->display_layout;
        $pattribute->is_searchable = $request->is_searchable;
        $pattribute->is_comparable = $request->is_comparable;
        $pattribute->is_use_in_product_listing = $request->is_use_in_product_listing;
        $pattribute->order = $request->order;

        // Check if image file is present
        // if ($request->hasFile('images')) {
        //     $logo = $request->file('images');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/product_attributes', $logoName);
        //     $pattribute->images = $logoName;
        // }


        $pattribute->save();

        return redirect()->back()->with('success', 'Product attribute updated successfully.');
    }


    public function delete_product_attributes($id)
    {

        $pattribute = ProductAttribute::findOrFail($id);

        $pattribute->delete();

        return redirect()->back()->with('success', 'Product attribute deleted successfully.');
    }
}
