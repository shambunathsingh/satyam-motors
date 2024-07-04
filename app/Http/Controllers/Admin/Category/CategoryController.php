<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "Carzex - Categories";

        // Fetch all categories
        $categories_list = Category::all();

        // Return the view with the categories data
        return view('admin.category.index', ['title' => $title, 'categories' => $categories_list]);
    }


    public function add()
    {

        $title = "Carzex - Add Categories";

        // Add your admin dashboard logic here
        return view('admin.category.add', ['title' => $title]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cat_name' => 'required|string',
            'cat_parent' => 'nullable|string',
            'cat_desc' => 'nullable|string',
            'cat_default' => 'nullable|boolean',
            'cat_icon' => 'nullable|string',
            'cat_order' => 'nullable|integer',
            'cat_isfeatured' => 'nullable|boolean',
            'cat_status' => 'required|in:published,draft,pending',
        ]);

        // Ensure cat_default is explicitly cast to a boolean
        $cat_default = $request->input('cat_default', false); // Set default value to false if not provided
        $cat_isfeatured = $request->input('cat_isfeatured', false); // Set default value to false if not provided

        // Create a new category instance
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_parent = $request->cat_parent;
        $category->cat_desc = $request->cat_desc;
        $category->cat_default = (bool) $cat_default; // Cast to boolean
        $category->cat_icon = $request->cat_icon;
        $category->cat_order = $request->cat_order;
        $category->cat_isfeatured = (bool) $cat_isfeatured; // Cast to boolean
        $category->cat_status = $request->cat_status;

        // Save the category to the database
        $category->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Category created successfully.');
    }


    public function edit($id)
    {
        $title = "Carzex - Edit Categories";

        $category = Category::find($id);
        return view(
            'admin.category.edit',
            compact('category'),
            ['title' => $title]
        );
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'cat_name' => 'required|string',
            'cat_parent' => 'nullable|string',
            'cat_desc' => 'nullable|string',
            'cat_default' => 'nullable|string',
            'cat_icon' => 'nullable|string',
            'cat_order' => 'nullable|integer',
            'cat_isfeatured' => 'nullable|string',
            'cat_status' => 'required|in:published,draft,pending',
        ]);

        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Update the category attributes
        $category->cat_name = $request->cat_name;
        $category->cat_parent = $request->cat_parent;
        $category->cat_desc = $request->cat_desc;
        $category->cat_default = $request->has('cat_default') ? 1 : 0; // Convert boolean to integer
        $category->cat_icon = $request->cat_icon;
        $category->cat_order = $request->cat_order;
        $category->cat_isfeatured = $request->has('cat_isfeatured') ? 1 : 0; // Convert boolean to integer
        $category->cat_status = $request->cat_status;

        // Output the form data before saving
        // dd($category);

        // Save the changes to the database
        $category->save();

        // Redirect back or wherever you want after updating
        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // dd($category);
        // Delete the category
        $category->delete();

        // Redirect back or wherever you want after deletion
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function fetchCategoryData($id)
    {
        // Fetch category data based on the provided ID
        $category = Category::find($id);

        if ($category) {
            // If category found, return the category data
            return response()->json($category);
        } else {
            // If category not found, return an error message
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
