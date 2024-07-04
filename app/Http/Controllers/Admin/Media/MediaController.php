<?php

namespace App\Http\Controllers\Admin\Media;

use App\Actions\File\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Media\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class MediaController extends Controller
{
    public function index()
    {
        $title = "Carzex - Media";

        $media_list = Media::all();
        return view('admin.media.index', ['title' => $title, 'medias' => $media_list]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'media_gallery' => 'required',
            'media_gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image files
        ]);

        if ($request->hasFile('media_gallery')) {
            foreach ($request->file('media_gallery') as $file) {
                if ($file->isValid()) {
                    $logoName = $file->getClientOriginalName();
                    // $path = $file->storeAs('public/media', $logoName);
                    // $url = Storage::url($path);

                    $url = FileUpload::upload($file, "media");


                    $media = new Media();
                    $media->name = $logoName;
                    $media->alt_text = $logoName;
                    $media->images = $url;
                    try {
                        // Save the Media object to the database
                        $media->save();
                    } catch (\Exception $e) {
                        // Handle any database save errors
                        return redirect()->back()->with('error', 'Failed to save file to the database: ' . $e->getMessage());
                    }
                }
            }
            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files selected for upload.');
    }

    public function downloadImages(Request $request)
    {
        // Validate the request
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|string|url',
        ]);

        // Create a temporary directory to store the downloaded images
        $tempDir = tempnam(sys_get_temp_dir(), 'images_');
        unlink($tempDir);
        mkdir($tempDir);

        // Download and save each selected image
        foreach ($request->images as $imageUrl) {
            $imageData = file_get_contents($imageUrl);
            $imageName = basename($imageUrl);
            file_put_contents($tempDir . '/' . $imageName, $imageData);
        }

        // Create a zip archive containing the downloaded images
        $zipFile = tempnam(sys_get_temp_dir(), 'images_zip_') . '.zip';
        $zip = new ZipArchive();
        $zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = glob($tempDir . '/*');
        foreach ($files as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();

        // Clean up the temporary directory
        foreach ($files as $file) {
            unlink($file);
        }
        rmdir($tempDir);

        // Return the zip file as a download response
        return response()->download($zipFile)->deleteFileAfterSend(true);
    }
}
