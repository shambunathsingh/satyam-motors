<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Ecommerce\EcommerceController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Pages\PageController;
use App\Http\Controllers\Admin\ProductAttribute\ProductAttributeController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Admin\FAQ\FAQController;
use App\Http\Controllers\Admin\Media\MediaController;
use App\Http\Controllers\Admin\NewsLetter\NewsLetterController;
use App\Http\Controllers\Admin\ProductOptions\ProductOptionController;
use App\Models\Page\Page;
use App\Models\Page\PageInfo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('test', function () {
//     return view('test');
// });

Route::get('/customer-import', [DataImportController::class, 'index']);
Route::post('/customer-import', [DataImportController::class, 'importExcelData']);

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('page/{id}', [HomeController::class, 'showPage'])->name('page');
// $page = Page::all();
// $page_info = PageInfo::all();



Route::get('return-warranty', [HomeController::class, 'return_warranty'])->name('return_warranty');
Route::get('privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');
Route::get('terms-conditions', [HomeController::class, 'terms_condition'])->name('terms_condition');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('teams', [HomeController::class, 'team'])->name('team');
Route::get('shipping-policy', [HomeController::class, 'shipping_policy'])->name('shipping_policy');

// Product Section
Route::get('product-category', [FrontProductController::class, 'allproducts'])->name('allproducts');
Route::get('product/{id}', [FrontProductController::class, 'single_product'])->name('single_product');



/* ADMIN SECTION */
// Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

// User Section
// Route::get('users', [UserController::class, 'index'])->name('admin.users');
// Route::get('add-user', [UserController::class, 'add'])->name('admin.add_user');
// Route::get('edit-user', [UserController::class, 'edit'])->name('admin.edit_user');

// Product Section
// Route::get('products', [ProductController::class, 'index'])->name('admin.products');
// Route::get('add-user', [ProductController::class, 'add'])->name('admin.add_product');
// Route::get('edit-user', [ProductController::class, 'edit'])->name('admin.edit_product');

// Category Section
// Route::get('categories', [CategoryController::class, 'index'])->name('admin.category');





Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {

    /* ADMIN SECTION */
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');


    // Category Section
    // Route::get('categories', [CategoryController::class, 'index'])->name('category');
    // Route::get('add-categories', [CategoryController::class, 'add'])->name('add_category');
    // Route::post('create-categories', [CategoryController::class, 'store'])->name('create_category');

    // Route::get('edit-categories/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    // Route::put('update-categories/{id}', [CategoryController::class, 'update'])->name('update_category');
    // Route::get('delete-categories/{id}', [CategoryController::class, 'delete'])->name('delete_category');

    // Page Section
    Route::group(['prefix' => 'pages/', 'as' => 'page.'], function () {

        Route::get('all-pages', [PageController::class, 'index'])->name('pages');
        Route::get('edit/{id}', [PageController::class, 'edit'])->name('page_edit');
        Route::get('add-page', [PageController::class, 'add'])->name('page_add');
        Route::post('save-page', [PageController::class, 'store'])->name('page_save');
        Route::post('update-page/{id}', [PageController::class, 'update'])->name('page_update');
    });


    // Ecommerce Section
    Route::group(['prefix' => 'ecommerce/', 'as' => 'ecommerce.'], function () {


        // Product categories
        Route::get('product-categories', [EcommerceController::class, 'product_categories'])->name('product_categories');
        Route::post('store-product-categories', [ProductController::class, 'store_pcategory'])->name('save_pcategories');

        Route::get('product-categories/create', [ProductController::class, 'create_pcategory'])->name('create_pcategory');
        Route::post('update-product-categories/{id}', [ProductController::class, 'update_pcategory'])->name('update_pcategory');
        Route::get('delete-product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

        Route::get('/fetch-category-data/{id}', [CategoryController::class, 'fetchCategoryData'])->name('fetch.category.data');



        // Product Attributes
        Route::get('product-attribute-sets', [EcommerceController::class, 'product_attributes'])->name('product_attributes');
        Route::get('product-attribute-sets/create', [ProductAttributeController::class, 'create_product_attributes'])->name('create_product_attributes');
        Route::post('store-product-attribute-sets', [ProductAttributeController::class, 'store_product_attributes'])->name('save_product_attributes');

        Route::get('product-attribute-sets/edit/{id}', [ProductAttributeController::class, 'edit_product_attributes'])->name('edit_product_attributes');
        Route::post('update-product-attribute-sets/{id}', [ProductAttributeController::class, 'update_product_attributes'])->name('update_product_attributes');
        Route::get('delete-product-attribute-sets/{id}', [ProductAttributeController::class, 'delete_product_attributes'])->name('delete_product_attributes');



        // Product Options
        Route::get('options', [EcommerceController::class, 'product_option'])->name('product_option');
        Route::get('options/create', [EcommerceController::class, 'create_product_option'])->name('create_product_option');
        Route::post('store-options', [ProductOptionController::class, 'store_product_option'])->name('save_product_option');

        Route::get('options/edit/{id}', [EcommerceController::class, 'edit_product_option'])->name('edit_product_option');
        Route::post('update-options/{id}', [ProductOptionController::class, 'update_product_option'])->name('update_product_option');
        Route::get('delete-options/{id}', [ProductOptionController::class, 'delete_product_option'])->name('delete_product_option');

        // all products
        Route::get('all-products', [EcommerceController::class, 'product'])->name('product');
        Route::get('products/create/', [EcommerceController::class, 'create_product'])->name('create_product');
        Route::post('store-product', [ProductController::class, 'store_product'])->name('save_product');

        Route::post('import-product', [DataImportController::class, 'productImportExcelData'])->name('import_product');
        Route::get('export-product', [DataImportController::class, 'productExportExcelData'])->name('export_product');

        Route::get('products/edit/{id}', [EcommerceController::class, 'edit_product'])->name('edit_product');
        Route::post('update-product/{id}', [ProductController::class, 'update_product'])->name('update_product');
        Route::get('delete-product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');


        // product tag
        Route::get('product-tags', [EcommerceController::class, 'product_tags'])->name('product_tags');

        Route::get('product-tags/create', [EcommerceController::class, 'create_product_tags'])->name('create_product_tags');
        Route::post('store-tag', [ProductController::class, 'store_tags'])->name('save_tag');

        Route::get('product-tags/edit-tag/{id}', [EcommerceController::class, 'edit_product_tags'])->name('edit_product_tags');
        Route::post('update-tag/{id}', [ProductController::class, 'update_tag'])->name('update_product_tags');
        Route::get('delete-tag/{id}', [ProductController::class, 'delete_tag'])->name('delete_product_tags');

        // prdouct brands
        Route::get('brands', [EcommerceController::class, 'brands'])->name('brands');

        Route::get('brands/create', [EcommerceController::class, 'create_product_brands'])->name('create_brands');
        Route::post('store-brand', [ProductController::class, 'store_brands'])->name('save_brand');

        Route::get('brands/edit-brand/{id}', [EcommerceController::class, 'edit_product_brands'])->name('edit_product_brands');
        Route::post('update-brand/{id}', [ProductController::class, 'update_brand'])->name('update_brand');
        Route::get('delete-brand/{id}', [ProductController::class, 'delete_brand'])->name('delete_brand');


        // prdouct brands
        Route::get('discounts', [EcommerceController::class, 'discounts'])->name('discounts');

        Route::get('discounts/create', [EcommerceController::class, 'create_product_discounts'])->name('create_discounts');
        Route::post('store-discount', [ProductController::class, 'store_discounts'])->name('save_discounts');

        Route::get('delete-discount/{id}', [ProductController::class, 'delete_discounts'])->name('delete_discounts');



        // prdouct brands
        Route::get('taxes', [EcommerceController::class, 'taxes'])->name('taxes');

        Route::get('taxes/create', [EcommerceController::class, 'create_taxes'])->name('create_taxes');
        Route::post('store-tax', [ProductController::class, 'store_tax'])->name('store_tax');

        Route::get('taxes/edit/{id}', [EcommerceController::class, 'edit_taxes'])->name('edit_tax');
        Route::post('update-tax/{id}', [ProductController::class, 'update_tax'])->name('update_tax');
        Route::get('delete-tax/{id}', [ProductController::class, 'delete_tax'])->name('delete_tax');



        // product collections
        Route::get('product-collections', [EcommerceController::class, 'product_collection'])->name('product_collection');

        Route::get('product-collections/create', [EcommerceController::class, 'create_product_collection'])->name('create_product_collection');
        Route::post('store-product-collection', [ProductController::class, 'store_product_collection'])->name('store_product_collection');

        Route::get('product-collections/edit/{id}', [EcommerceController::class, 'edit_product_collection'])->name('edit_product_collection');
        Route::post('update-product-collections/{id}', [ProductController::class, 'update_product_collection'])->name('update_product_collection');
        Route::get('delete-product-collections/{id}', [ProductController::class, 'delete_product_collection'])->name('delete_product_collection');


        // product label
        Route::get('product-labels', [EcommerceController::class, 'product_label'])->name('product_label');

        Route::get('product-labels/create', [EcommerceController::class, 'create_product_label'])->name('create_product_label');
        Route::post('store-product-labels', [ProductController::class, 'store_product_label'])->name('store_product_label');

        Route::get('product-labels/edit/{id}', [EcommerceController::class, 'edit_product_label'])->name('edit_product_label');
        Route::post('update-product-labels/{id}', [ProductController::class, 'update_product_label'])->name('update_product_label');
        Route::get('delete-product-labels/{id}', [ProductController::class, 'delete_product_label'])->name('delete_product_label');


        // product features
        Route::get('product-features', [EcommerceController::class, 'product_features'])->name('product_features');

        Route::get('product-features/create', [EcommerceController::class, 'create_product_features'])->name('create_product_features');
        Route::post('store-product-features', [ProductController::class, 'store_product_features'])->name('store_product_features');

        Route::get('product-features/edit/{id}', [EcommerceController::class, 'edit_product_features'])->name('edit_product_features');
        Route::post('update-product-features/{id}', [ProductController::class, 'update_product_features'])->name('update_product_features');
        Route::get('delete-product-features/{id}', [ProductController::class, 'delete_product_features'])->name('delete_product_features');
    });


    // FAQ Section
    Route::group(['prefix' => 'faqs/', 'as' => 'faq.'], function () {

        // product faqs
        Route::get('', [FAQController::class, 'index'])->name('faqs');
        Route::get('create', [FAQController::class, 'create_faqs'])->name('add_faqs');
        Route::post('store-faq', [FAQController::class, 'store_faqs'])->name('save_faqs');

        Route::get('edit/{id}', [FAQController::class, 'edit_faqs'])->name('edit_faqs');
        Route::post('update/{id}', [FAQController::class, 'update_faqs'])->name('update_faqs');
        Route::get('delete/{id}', [FAQController::class, 'delete_faqs'])->name('delete_faqs');
    });

    // FAQ Categories Section
    Route::group(['prefix' => 'faq-categories/', 'as' => 'faq-categories.'], function () {

        Route::get('', [FAQController::class, 'category'])->name('faqs_category');
        Route::get('create', [FAQController::class, 'create_faqs_category'])->name('add_faqs_category');
        Route::post('store-faqs-category', [FAQController::class, 'store_faqs_category'])->name('save_faqs_category');

        Route::get('edit/{id}', [FAQController::class, 'edit_faqs_category'])->name('edit_faqs_category');
        Route::post('update/{id}', [FAQController::class, 'update_faqs_category'])->name('update_faqs_category');
        Route::get('delete/{id}', [FAQController::class, 'delete_faqs_category'])->name('delete_faqs_category');
    });

    // Blog Section
    Route::group(['prefix' => 'blog/', 'as' => 'blog.'], function () {

        // POSTS
        Route::get('posts', [BlogController::class, 'posts'])->name('posts');
        Route::get('posts/create', [BlogController::class, 'create_posts'])->name('add_posts');
        Route::post('store-posts', [BlogController::class, 'store_posts'])->name('save_posts');

        Route::get('edit/{id}', [BlogController::class, 'edit_posts'])->name('edit_posts');
        Route::post('update/{id}', [BlogController::class, 'update_posts'])->name('update_posts');
        Route::get('delete/{id}', [BlogController::class, 'delete_posts'])->name('delete_posts');


        // TAGS
        Route::group(['prefix' => 'tags/', 'as' => 'tag.'], function () {

            Route::get('', [BlogController::class, 'tags'])->name('tags');
            Route::get('create', [BlogController::class, 'create_tags'])->name('add_tags');
            Route::post('store-tags', [BlogController::class, 'store_tags'])->name('save_tags');

            Route::get('edit/{id}', [BlogController::class, 'edit_tags'])->name('edit_tags');
            Route::post('update/{id}', [BlogController::class, 'update_tags'])->name('update_tags');
            Route::get('delete/{id}', [BlogController::class, 'delete_tags'])->name('delete_tags');
        });

        // CATEGORIES
        Route::group(['prefix' => 'categories/', 'as' => 'categories.'], function () {

            Route::get('', [BlogController::class, 'categories'])->name('categories');
            Route::get('create', [BlogController::class, 'create_categories'])->name('add_categoriescategories');
            Route::post('store-categories', [BlogController::class, 'store_categories'])->name('save_categories');

            Route::get('edit/{id}', [BlogController::class, 'edit_categories'])->name('edit_categories');
            Route::post('update/{id}', [BlogController::class, 'update_categories'])->name('update_categories');
            Route::get('delete/{id}', [BlogController::class, 'delete_categories'])->name('delete_categories');

            Route::get('/fetch-category-data/{id}', [BlogController::class, 'fetchCategoryData'])->name('fetch.category.data');
        });
    });

    // Newsletter Section
    Route::group(['prefix' => 'newsletters/', 'as' => 'newsletters.'], function () {

        // POSTS
        Route::get('', [NewsLetterController::class, 'index'])->name('index');

    });


    // Media Section
    Route::get('media', [MediaController::class, 'index'])->name('media');
    Route::post('store-media', [MediaController::class, 'store'])->name('save_media');
    Route::post('download-images', [MediaController::class, 'downloadImages'])->name('download_images');



    Route::get('all-sliders', [PageController::class, 'home'])->name('homepage');
    Route::get('add-slider', [PageController::class, 'add_slider'])->name('banner_upload');
    Route::get('edit-slider/{id}', [PageController::class, 'banner_edit'])->name('banner_edit');
    Route::put('update-banner/{id}', [PageController::class, 'banner_update'])->name('banner_update');
    Route::get('delete-banner/{id}', [PageController::class, 'banner_delete'])->name('banner_update');

    Route::get('videopage', [PageController::class, 'video'])->name('videopage');
    Route::post('upload-video', [PageController::class, 'video_upload'])->name('video_upload');
    Route::get('edit-video/{id}', [PageController::class, 'video_edit'])->name('video_edit');
    Route::put('update-video/{id}', [PageController::class, 'video_update'])->name('video_update');
    Route::get('delete-video/{id}', [PageController::class, 'video_delete'])->name('video_delete');
});
