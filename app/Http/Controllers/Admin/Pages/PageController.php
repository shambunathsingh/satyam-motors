<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Actions\File\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Homepage\HomePage;
use App\Models\Page\Page;
use App\Models\Page\PageInfo;
use App\Models\Video\Video;
use Illuminate\Support\Str; // Add this import statement
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = "Carzex - Pages";

        // Fetch all pages
        $page_list = Page::all();

        // Return the view with the homepage data
        return view('admin.pages.index', ['title' => $title, 'pages' => $page_list]);
    }
    public function delete($id)
    {
        $title = "Carzex - Pages-delete";
        // Find the category by its ID

        $Page = Page::findOrFail($id);

        $Page->delete();
        // Redirect back or wherever you want after deletion
        return redirect()->back()->with('success', 'Pages deleted successfully.');
    }
    public function edit($id)
    {
        // Find the Page with the given ID
        $page = Page::find($id);

        // Check if the page exists
        if (!$page) {
            // Handle the case where the page with the given ID doesn't exist, perhaps redirect or display an error.
            return redirect()->back()->with('error', 'Page not found.');
        }

        $pageInfo = PageInfo::where('page_id', $id)->first();

        // $page_info = $pageInfo->info;

        // Fetch the name of the page
        $title = $page->name;
        // echo $page;
        // dd($title,$page_info);

        // Return the view with the page data
        return view('admin.pages.edit', ['title' => $title, 'page' => $page, 'pageInfo' => $pageInfo]);
        // return view('welcome', ['title' => $title, 'page' => $page, 'pageInfo' => $page_info]);
    }


    public function add()
    {
        $title = "Carzex - Add New Page";


        // Return the view with the homepage data
        return view('admin.pages.add', ['title' => $title]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create a new page instance
        $page = new Page();
        $page->name = $request->name;

        // Save the page first to get an ID
        $page->save();

        // Now that the page is saved, create PageInfo and associate it with the page
        $pageinfo = new PageInfo();
        $pageinfo->page_id = $page->id;
        $pageinfo->info = $request->description;

        // Save the PageInfo
        $pageinfo->save();

        return redirect()->back()->with('success', 'Page created successfully.');
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'video1' => '',
            'video2' => '',
        ]);

        // Find the page by its ID
        $page = Page::findOrFail($id);

        // Find the PageInfo associated with the Page ID
        $pageInfo = PageInfo::where('page_id', $id)->first();

        // If PageInfo doesn't exist, create a new one
        if (!$pageInfo) {
            $pageInfo = new PageInfo();
            $pageInfo->page_id = $id;
        }

        // Update the attributes
        $page->name = $request->name;
        $pageInfo->info = $request->description;
        $pageInfo->video1 = $request->video1;
        $pageInfo->video2 = $request->video2;

        // Save both the Page and PageInfo
        $page->save();
        $pageInfo->save();

        // Redirect back or wherever you want after updating
        return redirect()->back()->with('success', 'Page updated successfully.');
    }


    public function home()
    {
        $title = "Carzex - Homepage";

        // Fetch all homepage
        $homepage_list = HomePage::get();

        // Return the view with the homepage data
        return view('admin.homepage', ['title' => $title, 'homepage' => $homepage_list]);
        // return view('admin.homepage', ['title' => $title]);
    }

    public function add_slider()
    {
        $title = "Carzex - Add New Slider";

        // Return the view with the homepage data
        return view('admin.sliders.add', ['title' => $title]);
    }
    public function save_slider()
    {
        $title = "Carzex - Add New Slider";

        // Return the view with the homepage data
        return view('admin.sliders.add', ['title' => $title]);
    }
    public function home_banner(Request $request)
    {
        // Validate the request
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Adjust max file size as needed
            'name' => 'required|string|max:255',
            'description' => '',
            'status' => 'required|in:published,draft,pending',
        ]);

        $banner = new HomePage();
        $banner->name = $request->input('name');
        $banner->description = $request->input('description');
        $banner->status = $request->input('status');

        // Check if a file is uploaded
        // if ($request->hasFile('banner')) {
        //     // Get the file from the request
        //     $file = $request->file('banner');
        //     // Generate a unique name for the file
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     // Store the file in the public/banners directory
        //     $filePath = $file->storeAs('public/banners', $fileName);
        //     // Create or update the homepage record with the file path and other fields
        //     $banner->banner = 'banners/' . $fileName;
        // }

        // Updated code for image upload
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "banners");

                $banner->banner = $url;
            }
        }

        $banner->save();

        return redirect()->back()->with('success', 'Banner uploaded successfully!');

        // Return an error response if no file is uploaded
        // return redirect()->back()->with('error', 'No banner uploaded.');
    }


    public function banner_edit($id)
    {

        $title = "Carzex - Edit Banner";

        $banner = HomePage::find($id);
        return view(
            'admin.sliders.edit',
            compact('banner'),
            ['title' => $title]
        );
    }

    public function update_banner(Request $request)
    {
        // Validate the request
        $request->validate([
            'banner' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048', // Optional, adjust max file size as needed
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:published,draft,pending',
        ]);

        // Fetch the existing homepage record or create a new one if it doesn't exist
        $homepage = HomePage::firstOrCreate([]);

        // Check if a file is uploaded
        // if ($request->hasFile('banner')) {
        //     // Get the file from the request
        //     $file = $request->file('banner');

        //     // Generate a unique name for the file
        //     $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();

        //     // Store the file in the public/banners directory
        //     try {
        //         $file->storeAs('public/banners', $fileName);
        //     } catch (\Exception $e) {
        //         return redirect()->back()->with('error', 'Failed to upload the banner.');
        //     }

        //     // Update the banner field with the new file name
        //     $homepage->banner = 'banners/' . $fileName;
        // }

        // Update other fields
        $homepage->name = $request->input('name');
        $homepage->description = $request->input('description');
        $homepage->status = $request->input('status');

        // Updated code for image upload
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "banners");

                $homepage->banner = $url;
            }
        }

        // Save the changes
        $homepage->save();

        // Return a success response
        return redirect()->back()->with('success', 'Banner updated successfully!');
    }

    public function banner_delete($id)
    {
        // Find the category by its ID
        $banner = HomePage::findOrFail($id);

        // dd($category);
        // Delete the category
        $banner->delete();

        // Redirect back or wherever you want after deletion
        return redirect()->back()->with('success', 'Banner deleted successfully.');
    }

    public function video()
    {
        $title = "Carzex - Homepage Videos";

        // Fetch all homepage
        $vidoe_list = Video::get();

        // Return the view with the homepage data
        return view('admin.videopage', ['title' => $title, 'videopage' => $vidoe_list]);
        // return view('admin.videopage', ['title' => $title]);
    }

    public function video_upload(Request $request)
    {

        $request->validate([
            'embed_url' => 'required|string',
        ]);


        $videos = new Video();
        $videos->embed_url = $request->embed_url;

        // Save the category to the database
        $videos->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Video created successfully.');
    }

    public function video_edit($id)
    {

        $title = "Carzex - Edit Videos";

        $video = Video::find($id);
        return view(
            'admin.video_edit',
            compact('video'),
            ['title' => $title]
        );
    }

    public function video_update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'embed_url' => 'required|string'
        ]);

        // Find the Video by its ID
        $video = Video::findOrFail($id);

        // Update the category attributes
        $video->embed_url = $request->embed_url;

        // Output the form data before saving
        // dd($category);

        // Save the changes to the database
        $video->save();

        // Redirect back or wherever you want after updating
        return redirect()->back()->with('success', 'Video updated successfully.');
    }

    public function video_delete($id)
    {
        // Find the category by its ID
        $video = Video::findOrFail($id);

        // dd($category);
        // Delete the category
        $video->delete();

        // Redirect back or wherever you want after deletion
        return redirect()->back()->with('success', 'Video deleted successfully.');
    }
}
