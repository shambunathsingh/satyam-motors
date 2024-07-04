<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\PostCategory\PostCategory;
use App\Models\PostTag\PostTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function posts()
    {
        $title = "Carzex - Posts";

        $post_list = Post::all();

        $cat_list = PostCategory::all();


        // Return the view with the categories data
        return view('admin.blogs.posts.index', ['title' => $title, 'posts' => $post_list, 'categorys' => $cat_list]);
    }

    public function create_posts()
    {
        $title = "Carzex - Create new post";

        $cat_list = PostCategory::all();

        // Return the view with the categories data
        return view('admin.blogs.posts.add', ['title' => $title, 'categorys' => $cat_list]);
    }

    public function edit_posts($id)
    {
        $title = "Carzex - Edit post";

        $post = Post::findOrFail($id);
        $cat_list = PostCategory::all();

        // Return the view with the categories data
        return view('admin.blogs.posts.edit', ['title' => $title, 'post' => $post,  'categorys' => $cat_list]);
    }


    public function store_posts(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'is_featured' => '',
            'content' => '',
            'time_to_read' => '',
            'layout' => '',
            'status' => '',
            'categories' => '',
            'image' => '',
            'tag' => '',
        ]);

        // Create a new category instance
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->is_featured = $request->is_featured;
        $post->content = $request->content;
        $post->time_to_read = $request->time_to_read;
        $post->layout = $request->layout;
        $post->status = $request->status;
        $post->categories = $request->categories;


        // Check if image file is present
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $logoName = $logo->getClientOriginalName(); // You may customize the filename as needed
            $logo->storeAs('public/posts', $logoName); // Store the logo in the storage folder, change 'logos' to your desired directory
            $post->image = $logoName; // Save the filename to the database
        }

        $post->tag = $request->tag;

        // Save the category to the database
        $post->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function update_posts(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'is_featured' => '',
            'content' => '',
            'time_to_read' => '',
            'layout' => '',
            'status' => '',
            'categories' => '',
            'image' => '',
            'tag' => '',
        ]);

        // Create a new category instance
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->is_featured = $request->is_featured;
        $post->content = $request->content;
        $post->time_to_read = $request->time_to_read;
        $post->layout = $request->layout;
        $post->status = $request->status;
        $post->categories = $request->categories;


        // Check if image file is present
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $logoName = $logo->getClientOriginalName(); // You may customize the filename as needed
            $logo->storeAs('public/posts', $logoName); // Store the logo in the storage folder, change 'logos' to your desired directory
            $post->image = $logoName; // Save the filename to the database
        }

        $post->tag = $request->tag;

        // Save the category to the database
        $post->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Post updated successfully.');
    }

    public function delete_posts($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }


    // Post Categories
    public function categories()
    {
        $title = "Carzex - Post Categories";

        $pcat_list = PostCategory::all();


        return view('admin.blogs.category.index', ['title' => $title, 'pcats' => $pcat_list]);
    }

    public function store_categories(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'parent_id' => '',
            'description' => '',
            'is_default' => '',
            'icon' => '',
            'order' => '',
            'is_featured' => '',
            'status' => '',
        ]);


        // Create a new category instance
        $pcat = new PostCategory();
        $pcat->name = $request->name;
        $pcat->parent_id = $request->parent_id;
        $pcat->description = $request->description;
        $pcat->is_default = $request->is_default;
        $pcat->icon = $request->icon;
        $pcat->order = $request->order;
        $pcat->is_featured = $request->is_featured;
        $pcat->status = $request->status;

        // Save the category to the database
        $pcat->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function update_categories(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'parent_id' => '',
            'description' => '',
            'is_default' => '',
            'icon' => '',
            'order' => '',
            'is_featured' => '',
            'status' => '',
        ]);


        // Create a new category instance
        $pcat = PostCategory::findOrFail($id);
        $pcat->name = $request->name;
        $pcat->parent_id = $request->parent_id;
        $pcat->description = $request->description;
        $pcat->is_default = $request->is_default;
        $pcat->icon = $request->icon;
        $pcat->order = $request->order;
        $pcat->is_featured = $request->is_featured;
        $pcat->status = $request->status;


        $pcat->save();


        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function fetchCategoryData($id)
    {
        // Fetch category data based on the provided ID
        $pcat = PostCategory::find($id);

        if ($pcat) {
            // If category found, return the category data
            return response()->json($pcat);
        } else {
            // If category not found, return an error message
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    // Post Tag
    public function tags()
    {
        $title = "Carzex - Tags";

        $ptag_list = PostTag::all();

        // Return the view with the categories data
        return view('admin.blogs.tags.index', ['title' => $title, 'ptags' => $ptag_list]);
    }

    public function create_tags()
    {
        $title = "Carzex - Create new tag";



        // Return the view with the categories data
        return view('admin.blogs.tags.add', ['title' => $title]);
    }

    public function edit_tags($id)
    {

        $ptag = PostTag::findOrFail($id);

        $title = "Carzex - Edit " . $ptag->name;

        // Return the view with the categories data
        return view('admin.blogs.tags.edit', ['title' => $title, 'ptag' => $ptag]);
    }


    public function store_tags(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'status' => '',
        ]);


        $ptag = new PostTag();
        $ptag->name = $request->name;
        $ptag->description = $request->description;
        $ptag->status = $request->status;


        $ptag->save();


        return redirect()->back()->with('success', 'Tag created successfully.');
    }

    public function update_tags(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'status' => '',
        ]);


        $ptag = PostTag::findOrFail($id);
        $ptag->name = $request->name;
        $ptag->description = $request->description;
        $ptag->status = $request->status;


        $ptag->save();


        return redirect()->back()->with('success', 'Tag updated successfully.');
    }

    public function delete_tags($id)
    {
        $ptag = PostTag::findOrFail($id);

        $ptag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }
}
