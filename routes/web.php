<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CitiesController;
use App\Http\Controllers\Admin\Country\CountryController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Ecommerce\EcommerceController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Pages\PageController;
use App\Http\Controllers\Admin\ProductAttribute\ProductAttributeController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Admin\FAQ\FAQController;
use App\Http\Controllers\Admin\Location\LocationController;
use App\Http\Controllers\Admin\Media\MediaController;
use App\Http\Controllers\Admin\NewsLetter\NewsLetterController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\FlashSales\FlashSalesController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Http\Controllers\Admin\ProductOptions\ProductOptionController;
use App\Http\Controllers\Admin\States\StateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Front\Account\AccountController;
use App\Http\Controllers\WishlistController;
use App\Models\Page\Page;
use App\Models\Page\PageInfo;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Cart\Cart;
use App\Http\Controllers\Admin\Payments\PaymentsController;
use App\Http\Controllers\CashfreePaymentController;
use App\Http\Controllers\Admin\Marketplaces\MarketplaceController;
use App\Models\ImageTest;

// Route::get('search/update_flash_sales', [FlashSalesController::class, 'search_flash_sales_products'])->name('admin.ecommerce.update_flash_sales');

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
//     Route::get('/sendmessage', [SmsController::class, 'sendmessage']);
// Route::get('/send-otp', [SmsController::class, 'sendOTP']);
// // Route::post('/send-otp', [SmsController::class, 'sendOTP'])->name('send-otp');
// Route::get('/sms', [SmsController::class, 'index'])->name('sms.index');
// Route::get('/otp', [SmsController::class, 'showForm'])->name('otp.showForm');

// // Route::get('/send-otp', [SmsController::class, 'showForm'])->name('send-otp-form');

// Route::post('/sms', [SmsController::class, 'sms'])->name('sms.send');
// Route::post('/generate-otp', [SmsController::class, 'generateOtp'])->name('generateOtp');



Route::get('/admin/payments', [PaymentsController::class, 'payments'])->name('admin.payments');
Route::get('/admin/payments/methods', [PaymentsController::class, 'methods'])->name('admin.payments.methods');
Route::get('/admin/payments/edit/{id}', [PaymentsController::class, 'edit_product_payments'])->name('admin.payments.edit_product_payments');
// Route::post('/admin/payments/update/{id}', [PaymentsController::class, 'update_product_payments'])->name('admin.payments.update');

Route::get('/order_mail', [CartController::class, 'store']);

// Route::get('/sms', [CartController::class, 'smsView']);
// Route::post('/sms-send', [CartController::class, 'sms'])->name('send_sms');

Route::get('search', [FrontProductController::class, 'search']);
Route::get('search/suggestions', [FrontProductController::class, 'searchSuggestions']);

Route::get('test2', function () {

    $imagelist = ImageTest::all();

    return view('test2', ['singles' => $imagelist]);
});

Route::get('/customer-import', [DataImportController::class, 'index']);
Route::post('/customer-import', [DataImportController::class, 'importExcelData']);
Route::get('admin/customers', [AccountController::class, 'adminCustomer'])->name('admincustomer');
Route::get('admin/deleteCustomer/{id}', [AccountController::class, 'deleteCustomer'])->name('admin.deleteCustomer');
Route::get('admin/edit_customer/{id}', [AccountController::class, 'editCustomer'])->name('admin.editCustomer');
Route::post('admin/update_customer/{id}', [AccountController::class, 'updateCustomer'])->name('updateCustomer');


Route::middleware(['guest:web'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('front_home');
    Route::get('about-us', [HomeController::class, 'about'])->name('about');
    Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');
    Route::get('brand-category', [HomeController::class, 'brandCategory'])->name('b_category');
    Route::get('single-brand-category', [HomeController::class, 'singeleBrandCategory'])->name('s_category');
    Route::get('car-listing-no-sidebar', [HomeController::class, 'carListingNoSidebar'])->name('car_list_no_sidebar');
    Route::get('car-detail', [HomeController::class, 'carDetails'])->name('car_details');
    Route::get('faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('error', [HomeController::class, 'error'])->name('page_error');
    Route::get('customer-review', [HomeController::class, 'customerReview'])->name('customer_review');
    Route::get('return-exchange', [HomeController::class, 'returnExchange'])->name('return_exhcange');
    Route::get('blog-standard', [HomeController::class, 'blogStandard'])->name('blog_standard');
    Route::get('blog-details', [HomeController::class, 'blogDetail'])->name('blog_detail');


    // Product Section
    Route::get('product-category', [FrontProductController::class, 'allproducts'])->name('allproducts');
    Route::get('product-category/{parentCategory}', [FrontProductController::class, 'show'])->name('product-category.show');
    Route::get('product-category/{parentCategory}/{categoryName}', [FrontProductController::class, 'showWithParent'])->name('product-category.showWithParent');
    Route::get('product/{slug}', [FrontProductController::class, 'single_product'])->name('single_product');
    Route::post('/price_filter', [FrontProductController::class, 'priceFilter'])->name('price_filter');

    // Add to Cart
    Route::get('add-to-cart={id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/store-cart', function (Request $request) {
        $allCartItems = $request->input('allCartItems');

        // Store cartItems in Laravel session
        session(['cart' => $allCartItems]);

        // Alternatively, you can store it in the database or any other storage
        // YourModel::create(['cart_items' => json_encode($cartItems)]);

        return response()->json(['message' => 'Cart data stored successfully']);
    });

    // Account Section
    Route::get('my-account', [AccountController::class, 'index'])->name('myaccount');
    Route::get('overview', [AccountController::class, 'overview'])->name('overview');
    Route::POST('overview/{id}', [AccountController::class, 'updateprofile'])->name('updateprofile');
    Route::get('register', [AccountController::class, 'register'])->name('new_register');
    Route::post('create-user', [AccountController::class, 'registerUser'])->name('register_newUser');
    Route::post('customer-login', [AccountController::class, 'login'])->name('login_newUser');
    Route::post('guest-login', [AccountController::class, 'guestlogin'])->name('guest_login');

    // My Wishlist Section
    Route::post('add-to-wishlist/{id}', [WishlistController::class, 'add_to_wishlist'])->name('add_wishlist');
    Route::get('delete-wishlist/{id}', [WishlistController::class, 'delete_wishlist'])->name('delete_wishlist');
    Route::get('wishlist', [WishlistController::class, 'showAllWishList'])->name('show_wishlist');

    // My Order Section
    Route::get('my-orders', [CartController::class, 'thankyou'])->name('thankyou');
});

Route::middleware(['auth:customer'])->group(function () {
    // Route::get('my-account', [AccountController::class, 'index'])->name('myaccount');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('payment', [CartController::class, 'processPayment'])->name('payment');
    Route::get('logout-account', [AccountController::class, 'logout'])->name('myaccount_logout');
});


Route::get('cashfree/payments/create', [CashfreePaymentController::class, 'create'])->name('callback');
Route::post('cashfree/payments/store', [CashfreePaymentController::class, 'store'])->name('store');
Route::any('cashfree/payments/success', [CashfreePaymentController::class, 'success'])->name('success');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/


Route::get('generate-pdf', [InvoiceController::class, 'generatePdf']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('admin/login', [AuthController::class, 'index'])->name('login');
    Route::post('admin/login', [AuthController::class, 'login'])->name('login');
    // Limited attempts
    // Route::post('admin/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:2,1');

    Route::get('admin/register', [AuthController::class, 'register_view'])->name('register');
    Route::post('admin/register', [AuthController::class, 'register'])->name('register');
    // Limited attempts
    // Route::post('admin/register', [AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dhome');

    Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {

        /* ADMIN SECTION */
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::group(['prefix' => 'marketplaces/', 'as' => 'marketplaces.'], function () {
            Route::get('reports', [MarketplaceController::class, 'Marketplacesreports'])->name('reports');
            Route::get('stores', [MarketplaceController::class, 'index'])->name('stores');
            Route::get('create', [MarketplaceController::class, 'create'])->name('create');
            Route::post('create', [MarketplaceController::class, 'datastore'])->name('datastore');
            Route::get('edit/{id}', [MarketplaceController::class, 'edit'])->name('editstores');
            Route::GET('update/{id}', [MarketplaceController::class, 'update'])->name('update');
            Route::post('update/{id}', [MarketplaceController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [MarketplaceController::class, 'destroy'])->name('destroy');


            Route::get('vendors', [MarketplaceController::class, 'listVendorInfos'])->name('vendors');
            Route::get('settings', [MarketplaceController::class, 'settings'])->name('settings');
            Route::get('vendors/create', [MarketplaceController::class, 'showCreateForm'])->name('showCreateForm');
        });

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
            Route::get('delete/{id}', [PageController::class, 'delete'])->name('page_delete');
            Route::get('add-page', [PageController::class, 'add'])->name('page_add');
            Route::post('save-page', [PageController::class, 'store'])->name('page_save');
            Route::post('update-page/{id}', [PageController::class, 'update'])->name('page_update');
        });


        // Ecommerce Section
        Route::group(['prefix' => 'ecommerce/', 'as' => 'ecommerce.'], function () {

            // incompleteOrders
            Route::get('incomplete/customers/{id}', [OrderController::class, 'incomplete_show'])->name('incomplete_show');

            Route::get('/orders/incomplete', [OrderController::class, 'incompleteOrders'])->name('incompleteOrders');
            // Order section
            Route::get('orders', [OrderController::class, 'index'])->name('orders');
            Route::get('incomplete-orders', [OrderController::class, 'incomplete_orders'])->name('incomplete_orders');
            Route::get('api/orders', [OrderController::class, 'getOrders'])->name('api.orders');
            Route::get('delete-order/{id}', [OrderController::class, 'delete_order'])->name('delete_order');
            Route::get('edit-order/edit/{id}', [OrderController::class, 'edit_order'])->name('edit_order');

            //  Shipments section
            Route::get('shipments', [OrderController::class, 'shipments'])->name('shipments');
            // Route::get('api/orders', [OrderController::class, 'getOrders'])->name('api.orders');
            Route::get('delete-shipments/{id}', [OrderController::class, 'delete_shipments'])->name('delete_shipments');
            Route::get('edit-shipments/edit/{id}', [OrderController::class, 'edit_shipments'])->name('edit_shipments');



            // Customer section
            Route::get('customers', [CustomerController::class, 'index'])->name('customers');
            Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('edit_customers');
            Route::post('update/{id}', [CustomerController::class, 'update'])->name('update_customers');


            // Invoice section
            Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices');
            Route::get('invoices-template', [InvoiceController::class, 'invoice_template'])->name('invoice_template');
            Route::get('edit-invoices/edit/{id}', [InvoiceController::class, 'edit_invoices'])->name('edit_invoices');
            Route::get('download-invoices/{id}', [InvoiceController::class, 'download_invoices'])->name('download_invoices');
            Route::get('show-invoices/{id}', [InvoiceController::class, 'showPdf'])->name('show_invoices');


            Route::post('store-product-categories', [ProductController::class, 'store_pcategory'])->name('save_pcategories');

            Route::get('product-categories/create', [ProductController::class, 'create_pcategory'])->name('create_pcategory');
            Route::post('update-product-categories/{id}', [ProductController::class, 'update_pcategory'])->name('update_pcategory');
            Route::get('delete-product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

            Route::get('/fetch-category-data/{id}', [CategoryController::class, 'fetchCategoryData'])->name('fetch.category.data');

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
            Route::post('image-upload-test', [ProductController::class, 'test'])->name('test');

            Route::post('import-product', [DataImportController::class, 'productImportExcelData'])->name('import_product');
            Route::get('export-product', [DataImportController::class, 'productExportExcelData'])->name('export_product');

            Route::get('products/edit/{id}', [EcommerceController::class, 'edit_product'])->name('edit_product');
            Route::post('update-product/{id}', [ProductController::class, 'update_product'])->name('update_product');
            Route::get('delete-product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');
            Route::post('delete-product-image', [ProductController::class, 'destroy_image'])->name('delete_productImage');


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

            Route::get('contact', [EcommerceController::class, 'contact'])->name('contact');
            Route::get('contact/delete-contact/{id}', [EcommerceController::class, 'delete_contact'])->name('delete_contact');
            Route::get('contact/edit-contact/{id}', [EcommerceController::class, 'edit_contact'])->name('edit_contact');
            Route::post('update-contact/{id}', [EcommerceController::class, 'update_contact'])->name('update_contact');
            Route::get('update-contact/{id}', [EcommerceController::class, 'update_contact'])->name('update_contact');



            // settings
            Route::get('settings', [EcommerceController::class, 'settings'])->name('settings');

            Route::get('advanced-settings', [EcommerceController::class, 'advancedSettings'])->name('advancedSettings');
            Route::get('tracking-settings', [EcommerceController::class, 'trackingSettings'])->name('trackingSettings');
            Route::get('reports', [EcommerceController::class, 'reports'])->name('reports');


            // flash-sales

            Route::get('product/{product_id}', [FlashSalesController::class, 'getProductDetails']);

            Route::get('flash-sales', [FlashSalesController::class, 'flash_sales'])->name('flash_sales');
            Route::get('flash-sales/create', [FlashSalesController::class, 'create_product_flash_sales'])->name('create_flash_sales');
            Route::get('flash-sales/store', [FlashSalesController::class, 'store_flash_sales'])->name('save_flash_sales');
            Route::post('flash-sales/store', [FlashSalesController::class, 'store_flash_sales'])->name('save_flash_sales');
            // web.php
            Route::get('flash-sales/edit/{id}', [FlashSalesController::class, 'edit_product_flash_sales'])->name('edit_product_flash_sales');
            // web.php
            Route::post('update_product_flash_sales/{id}', [FlashSalesController::class, 'update_product_flash_sales'])
                ->name('pdate_product_flash_sales');

            Route::get('flash-sales/delete/{id}', [FlashSalesController::class, 'delete_flash_sales'])->name('delete_flash_sales');

            Route::get('search/update_flash_sales', [FlashSalesController::class, 'search_flash_sales_products'])->name('search_flash_sales_products');
            Route::post('search/update_flash_sales', [FlashSalesController::class, 'search_flash_sales_products'])->name('search_flash_sales_products');

            // Route::get('product/{id}', [FlashSalesController::class, 'get_product_details']);
            // Route::post('add_flash_sale_product', [FlashSalesController::class, 'add_flash_sale_product'])->name('add_flash_sale_product');

            Route::get('flash-sales/edit/{id}', [FlashSalesController::class, 'edit_product_flash_sales'])->name('edit_product_flash_sales');
            Route::post('flash-sales/edit/{id}', [FlashSalesController::class, 'update_product_flash_sales'])->name('update_product_flash_sales');

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

        // Countries Section
        Route::group(['prefix' => 'countries/', 'as' => 'countries.'], function () {

            // POSTS
            Route::get('', [CountryController::class, 'index'])->name('index');
            Route::get('create', [CountryController::class, 'create'])->name('add_country');
            Route::post('save-country', [CountryController::class, 'store'])->name('save_country');

            Route::get('edit/{id}', [CountryController::class, 'edit'])->name('edit_country');
            Route::post('update/{id}', [CountryController::class, 'update'])->name('update_country');
            Route::get('delete/{id}', [CountryController::class, 'delete'])->name('delete_country');
        });

        // States Section
        Route::group(['prefix' => 'states/', 'as' => 'states.'], function () {

            // POSTS
            Route::get('', [StateController::class, 'index'])->name('index');
            Route::get('create', [StateController::class, 'create'])->name('add_state');
            Route::post('save-state', [StateController::class, 'store'])->name('save_state');

            Route::get('edit/{id}', [StateController::class, 'edit'])->name('edit_state');
            Route::post('update/{id}', [StateController::class, 'update'])->name('update_state');
            Route::get('delete/{id}', [StateController::class, 'delete'])->name('delete_state');
        });

        // Cities Section
        Route::group(['prefix' => 'cities/', 'as' => 'cities.'], function () {

            // POSTS
            Route::get('', [CitiesController::class, 'index'])->name('index');
            Route::get('create', [CitiesController::class, 'create'])->name('add_city');
            Route::post('save-state', [CitiesController::class, 'store'])->name('save_city');

            Route::get('edit/{id}', [CitiesController::class, 'edit'])->name('edit_city');
            Route::post('update/{id}', [CitiesController::class, 'update'])->name('update_city');
            Route::get('delete/{id}', [CitiesController::class, 'delete'])->name('delete_city');
        });

        // Import Location Section
        Route::group(['prefix' => 'import-location/', 'as' => 'importLocation.'], function () {

            // POSTS
            Route::get('', [LocationController::class, 'import'])->name('index');
            Route::post('import-location', [LocationController::class, 'locationImportExcelData'])->name('import_location');
        });

        // Import Location Section
        Route::group(['prefix' => 'export-location/', 'as' => 'exportLocation.'], function () {

            // POSTS
            Route::get('', [LocationController::class, 'export'])->name('index');
            Route::get('export-location', [LocationController::class, 'locationExportExcelData'])->name('export_location');
        });

        // Media Section
        Route::get('media', [MediaController::class, 'index'])->name('media');
        Route::post('store-media', [MediaController::class, 'store'])->name('save_media');
        Route::post('download-images', [MediaController::class, 'downloadImages'])->name('download_images');

        // Route::post('/home-banner/update', [HomeController::class, 'banner_update'])->name('banner_update');


        Route::get('all-sliders', [PageController::class, 'home'])->name('homepage');
        Route::get('add-slider', [PageController::class, 'add_slider'])->name('banner_upload');
        Route::post('add-slider', [PageController::class, 'home_banner'])->name('home_banner');
        Route::get('edit-slider/{id}', [PageController::class, 'banner_edit'])->name('banner_edit');
        Route::post('update-slider', [PageController::class, 'update_banner'])->name('update_banner');
        Route::get('delete-banner/{id}', [PageController::class, 'banner_delete'])->name('banner_delete');

        Route::get('videopage', [PageController::class, 'video'])->name('videopage');
        Route::post('upload-video', [PageController::class, 'video_upload'])->name('video_upload');
        Route::get('edit-video/{id}', [PageController::class, 'video_edit'])->name('video_edit');
        Route::put('update-video/{id}', [PageController::class, 'video_update'])->name('video_update');
        Route::get('delete-video/{id}', [PageController::class, 'video_delete'])->name('video_delete');
    });
});
