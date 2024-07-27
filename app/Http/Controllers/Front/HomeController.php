<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brands;
use App\Models\Cart\Cart;
use App\Models\Category\Category;
use App\Models\ExtProductImage;
use App\Models\Page\Page;
use App\Models\Page\PageInfo;
use App\Models\Post\Post;
use App\Models\PostCategory\PostCategory;
use App\Models\Product\Product;
use App\Models\ProductEnquiry\ProductEnquiry;
use App\Models\ProductFeature\ProductFeatures;
use App\Models\ProductImages\ProductImages;
use App\Models\Video\Video;
use App\Models\WishList\WishList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $cartService;

    public function __construct(Cart $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $brands = Brands::all();
        $categories = Category::all();
        $totalProducts = Product::count();
        $featuredProducts = Product::all();

        $latestProducts = Product::orderBy('created_at', 'desc')->get();

        $productCounts = Product::select('brand_id', DB::raw('count(*) as total'))
            ->groupBy('brand_id')
            ->pluck('total', 'brand_id');

        return view('front.homepage.index', [
            'brands' => $brands,
            'categories' => $categories,
            'productCounts' => $productCounts,
            'totalProducts' => $totalProducts,
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
        ]);
    }


    public function about()
    {
        $title = "Contact";

        return view('front.homepage.about',['title' => $title]);
    }

    public function brandCategory()
    {
        $title = "All Brands";

        // Eager load the products for each brand
        $allbrands = Brands::with('products')->get();

        // dd($allbrands);
        // exit;

        return view('front.homepage.brand_category', ['title' => $title, 'brands' => $allbrands]);
    }


    public function singeleBrandCategory($id)
    {
        $brand = Brands::findOrFail($id);
        $title = "Brands | " . $brand->name;

        $allProducts = Product::all();

        // dd($categories);
        // exit;

        return view('front.homepage.single_brand_category', ['title' => $title, 'brand' => $brand, 'products' => $allProducts]);
    }

    public function carListingNoSidebar()
    {
        return view('front.homepage.car_listing_no_sidebar');
    }

    public function carDetails($id)
    {
        $title = "Satyam motors";

        $allProducts = Product::all();
        $product = Product::findOrFail($id);

        $intProductcount = ProductImages::where('product_id', $id)->count();
        $intProductImg = ProductImages::where('product_id', $id)->get();

        $extProductcount = ExtProductImage::where('product_id', $id)->count();
        $extProductImg = ExtProductImage::where('product_id', $id)->get();

        // dd($intProductcount, $intProductImg, $extProductcount, $extProductImg);
        // exit;

        return view('front.homepage.car_details',
            [
                'title' => $title,
                'product' => $product,
                'allproduct' => $allProducts,
                'int_productImg_count' => $intProductcount,
                'int_productImg' => $intProductImg,
                'ext_productImg_count' => $extProductcount,
                'ext_productImg' => $extProductImg,
            ]
        );
    }

    public function carEnquiry(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => '',
            'phone' => '',
            'mssg' => '',
        ]);

        $penquiry = new ProductEnquiry;
        $penquiry->product_id = $id;
        $penquiry->name = $request->name;
        $penquiry->email = $request->email;
        $penquiry->phone = $request->phone;
        $penquiry->mssg = $request->mssg;

        $penquiry->save();

        return redirect()->back()->with('Success', 'Your enquiry has been successfully generated.');
    }

    public function faq()
    {
        $title = "FAQs";

        return view('front.homepage.faq', ['title' => $title]);
    }

    public function error()
    {
        return view('front.homepage.error');
    }

    public function customerReview()
    {
        $title = "Reviews";

        return view('front.homepage.customer_review', ['title' => $title]);
    }

    public function returnExchange()
    {
        $title = "Returns & Exchange";

        return view('front.homepage.return_exchange', ['title' => $title]);
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
        $title = "Contact";

        return view('front.contact.index', ['title' => $title]);
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
