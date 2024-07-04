<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use App\Models\Category\Category;
use App\Models\Page\Page;
use App\Models\Page\PageInfo;
use App\Models\Post\Post;
use App\Models\PostCategory\PostCategory;
use App\Models\ProductFeature\ProductFeatures;
use App\Models\Video\Video;
use App\Models\WishList\WishList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $cartService;

    public function __construct(Cart $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('front.homepage.index');
    }

    public function about()
    {
        return view('front.homepage.about');
    }

    public function brandCategory()
    {
        return view('front.homepage.brand_category');
    }

    public function singeleBrandCategory()
    {
        return view('front.homepage.single_brand_category');
    }

    public function carListingNoSidebar()
    {
        return view('front.homepage.car_listing_no_sidebar');
    }

    public function carDetails()
    {
        return view('front.homepage.car_details');
    }

    public function faq()
    {
        return view('front.homepage.faq');
    }

    public function error()
    {
        return view('front.homepage.error');
    }

    public function customerReview()
    {
        return view('front.homepage.customer_review');
    }

    public function returnExchange()
    {
        return view('front.homepage.return_exchange');
    }

    public function blogStandard()
    {
        return view('front.blog.index');
    }

    public function blogDetail()
    {
        return view('front.blog.singleblog');
    }


    public function showPage($id)
    {
        $allpages = Page::all();

        $page = Page::find($id);
        if (!$page) {
            abort(404); // Or handle the case when the page is not found
        }

        // dd($page->name);
        // exit;
        $pageInfo = PageInfo::where('page_id', $id)->first(); // Assuming you have a foreign key 'page_id' in PageInfo table

        $title = $page->name;

        if ($title == 'Return & Warranty') {
            return view(
                'front.return_warranty.index',
                compact('page', 'pageInfo'),
                ['pages' => $allpages]
            );
        } elseif ($title == 'Privacy Policy') {
            return view(
                'front.privacy.index',
                compact('page', 'pageInfo'),
                ['pages' => $allpages]
            );
        } elseif ($title == 'Terms & Conditions') {
            return view(
                'front.terms_condition.index',
                compact('page', 'pageInfo'),
                ['pages' => $allpages]
            );
        } elseif ($title == 'Shipping Policy') {
            return view(
                'front.shipping_policy.index',
                compact('page', 'pageInfo'),
                ['pages' => $allpages]
            );
        }

        // return view('page', compact('page', 'pageInfo'));
    }

    public function return_warranty()
    {
        $page = Page::where('name', 'Return & Warranty')->first();

        if (!$page) {
            abort(404);
        }

        $title = "Carzex - " . $page->name;

        $page_info = PageInfo::where('page_id', $page->id)->first();

        // dd($title, $page_info);
        // exit;

        return view('front.return_warranty.index', ['title' => $title, 'pages' => $page, 'page_info' => $page_info]);
    }


    public function privacy()
    {

        $page = Page::where('name', 'Privacy Policy')->first();

        if (!$page) {
            abort(404);
        }

        $title = "Carzex - " . $page->name;

        $page_info = PageInfo::where('page_id', $page->id)->first();

        // dd($title, $page_info);
        // exit;

        // $title = "Carzex - Privacy Policy";

        return view('front.privacy.index', ['title' => $title, 'pages' => $page, 'page_info' => $page_info]);
    }

    public function blog()
    {

        $allpages = Page::all();

        $post_list = Post::all();
        $cat_list = PostCategory::all();

        // Retrieve the latest two posts
        $latest_posts = Post::latest()->take(2)->get();


        $title = "Carzex - Blogs";

        return view('front.blog.index', ['title' => $title, 'pages' => $allpages, 'posts' => $post_list, 'postCategory' => $cat_list, 'latest_posts' => $latest_posts]);
    }
    public function singleblog($id)
    {
        $allpages = Page::all();

        // Retrieve the specific post by id
        $post = Post::where('id', $id)->firstOrFail();

        // Retrieve all post categories
        $cat_list = PostCategory::all();

        // Retrieve the latest two posts
        $latest_posts = Post::latest()->take(2)->get();

        $title = "Carzex - Blogs";

        return view('front.blog.singleblog', [
            'title' => $title,
            'pages' => $allpages,
            'post' => $post, // Pass the specific post to the view
            'postCategory' => $cat_list,
            'latest_posts' => $latest_posts
        ]);
    }


    public function terms_condition()
    {

        $page = Page::where('name', 'Terms & Conditions')->first();

        if (!$page) {
            abort(404);
        }

        $title = "Carzex - " . $page->name;

        $page_info = PageInfo::where('page_id', $page->id)->first();

        // dd($title, $page_info);
        // exit;

        // $title = "Carzex - Terms & Conditions";

        return view('front.terms_condition.index', ['title' => $title, 'pages' => $page, 'page_info' => $page_info]);
    }

    public function contact()
    {


        return view('front.contact.index',);
    }

    public function team()
    {

        $allpages = Page::all();

        $title = "Carzex - Teams";

        return view('front.team.index', ['title' => $title, 'pages' => $allpages]);
    }

    public function shipping_policy()
    {

        $page = Page::where('name', 'Shipping Policy')->first();

        if (!$page) {
            abort(404);
        }

        $title = "Carzex - " . $page->name;

        $page_info = PageInfo::where('page_id', $page->id)->first();

        // dd($title, $page_info);
        // exit;

        // $title = "Carzex - Shipping Policy";

        return view('front.shipping_policy.index', ['title' => $title, 'pages' => $page, 'page_info' => $page_info]);
    }
}
