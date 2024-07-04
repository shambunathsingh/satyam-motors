<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ\FAQ;
use App\Models\FAQCategory\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $title = "Carzex - FAQ";

        $faq_list = FAQ::all();
        $fatcat_list = FAQCategory::all();

        return view('admin.faqs.index', ['title' => $title, 'faqs' => $faq_list], ['faqcats' => $fatcat_list]);
    }

    public function create_faqs()
    {
        $title = "Carzex - New FAQ";

        $fatcat_list = FAQCategory::all();

        return view('admin.faqs.add', ['title' => $title], ['faqcats' => $fatcat_list]);
    }

    public function edit_faqs($id)
    {
        $title = "Carzex - Edit FAQ";

        $faq = FAQ::findOrFail($id);

        return view('admin.faqs.edit', ['title' => $title], ['faq' => $faq]);
    }

    public function store_faqs(Request $request)
    {

        $request->validate([
            'category' => 'required|string',
            'question' => '',
            'answer' => '',
            'status' => '',
        ]);


        $faq = new FAQ();
        $faq->cat_id = $request->category;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;

        $faq->save();

        return redirect()->back()->with('success', 'FAQ created successfully.');
    }

    public function update_faqs(Request $request, $id)
    {

        $request->validate([
            'category' => 'required|string',
            'question' => '',
            'answer' => '',
            'status' => '',
        ]);


        $faq = FAQ::findOrFail($id);
        $faq->cat_id = $request->category;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;

        $faq->save();

        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function delete_faqs($id)
    {

        $faq = FAQ::findOrFail($id);

        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }



    // Category section

    public function category()
    {
        $title = "Carzex - FAQ Categories";

        $faqcat_list = FAQCategory::all();

        return view('admin.faqs.categories', ['title' => $title, 'faqcats' => $faqcat_list]);
    }

    public function create_faqs_category()
    {
        $title = "Carzex - New category";


        return view('admin.faqs.add_categories', ['title' => $title]);
    }

    public function edit_faqs_category($id)
    {
        $title = "Carzex - Edit category";

        $faqcat = FAQCategory::findOrFail($id);

        return view('admin.faqs.edit_categories', ['title' => $title], ['faqcat' => $faqcat]);
    }

    public function store_faqs_category(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'order' => '',
            'status' => '',
        ]);


        $faqcat = new FAQCategory();
        $faqcat->name = $request->name;
        $faqcat->order = $request->order;
        $faqcat->status = $request->status;

        $faqcat->save();

        return redirect()->back()->with('success', 'FAQ Category created successfully.');
    }

    public function update_faqs_category(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'order' => '',
            'status' => '',
        ]);


        $faqcat = FAQCategory::findOrFail($id);
        $faqcat->name = $request->name;
        $faqcat->order = $request->order;
        $faqcat->status = $request->status;

        $faqcat->save();

        return redirect()->back()->with('success', 'FAQ Category updated successfully.');
    }

    public function delete_faqs_category($id)
    {

        $faqcat = FAQCategory::findOrFail($id);

        $faqcat->delete();

        return redirect()->back()->with('success', 'FAQ Category deleted successfully.');
    }
}
