<?php

namespace App\Http\Controllers\Admin\Document;

use App\Actions\File\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Document\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $title = "Satyam Motors | Document Verification";

        $alldocuments = Document::all();

        return view('admin.document.index', ['title' => $title, 'documents' => $alldocuments]);
    }

    public function add()
    {
        $title = "Satyam Motors | Add Document Verification";


        return view('admin.document.add', ['title' => $title]);
    }

    public function edit($id)
    {

        $document = Document::findOrFail($id);

        $title = "Satyam Motors | Edit " . $document->name;


        return view('admin.document.edit', ['title' => $title, 'document' => $document]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'status' => '',
        ]);

        $document = new Document();
        $document->name = $request->name;
        $document->status = $request->status;

        // Updated code for image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                $url = FileUpload::upload($file, "Documents");
                $document->icon = $url;
            }
        }

        $document->save();

        return redirect()->back()->with('success', 'Document created successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'status' => '',
        ]);

        $document = Document::findOrFail($id);

        $document->name = $request->name;
        $document->status = $request->status;

        // Updated code for image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                $url = FileUpload::upload($file, "Documents");
                $document->icon = $url;
            }
        }

        $document->save();

        return redirect()->back()->with('success', 'Document updated successfully.');
    }


    public function delete($id)
    {
        $document = Document::findOrFail($id);

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
