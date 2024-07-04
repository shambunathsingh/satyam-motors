<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\File\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Brand\Brands;
use App\Models\Category\Category;
use App\Models\ImageTest;
use App\Models\Product\Product;
use App\Models\ProductCollection\ProductCollection;
use App\Models\ProductDiscount\ProductDiscount;
use App\Models\ProductFeature\ProductFeatures;
use App\Models\ProductImages\ProductImages;
use App\Models\ProductLabel\ProductLabel;
use App\Models\ProductTags\ProductTags;
use App\Models\Taxes\Taxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {

        $title = "Carzex - Products";

        return view('admin.product.index', ['title' => $title]);
    }

    public function add()
    {

        $title = "Carzex - Add Product";


        return view('admin.product.add', ['title' => $title]);
    }



    // PRODUCT CATEGORIES SECTION 
    public function create_pcategory(Request $request)
    {

        $title = "Carzex - Categories";

        // Fetch all categories
        $categories_list = Category::all();

        // Return the view with the categories data
        return view('admin.ecommerce.product_category', ['title' => $title, 'categories' => $categories_list]);
    }

    public function store_pcategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => '',
            'description' => '',
            'icon' => '',
            'order' => '',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'required|string',
            'is_main' => '',
            'is_featured' => '',
            'background_color' => '',
        ]);

        $pcategory = new Category();
        $pcategory->name = $request->name;
        $pcategory->parent_id = $request->parent_id;
        $pcategory->description = $request->description;
        $pcategory->icon = $request->icon;
        $pcategory->order = $request->order;
        $pcategory->status = $request->status;
        $pcategory->is_main = $request->is_main;
        $pcategory->is_featured = $request->is_featured;
        $pcategory->slug = Category::generateSlug($request->name);

        // Upload icon image if available
        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            if ($file->isValid()) {
                $url = FileUpload::upload($file, "p_category");
                $pcategory->image = $url;
            } else {
                return redirect()->back()->withErrors(['icon_image' => 'Invalid icon image file']);
            }
        }

        // Upload background image if available
        if ($request->hasFile('background_image')) {
            $backgroundImageFile = $request->file('background_image');
            if ($backgroundImageFile->isValid()) {
                $backgroundImageUrl = FileUpload::upload($backgroundImageFile, "p_category");
                $pcategory->background_image = $backgroundImageUrl;
            } else {
                return redirect()->back()->withErrors(['background_image' => 'Invalid background image file']);
            }
        }

        $pcategory->background_color = $request->background_color;

        // Save the category
        if ($pcategory->save()) {
            // Redirect or return response as needed
            return redirect()->back()->with('success', 'Category created successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to save category']);
        }
    }




    public function update_pcategory(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'parent_id' => '',
            'description' => '',
            'icon' => '',
            'order' => '',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'required|string',
            'is_main' => '',
            'is_featured' => '',
            'background_color' => '',
        ]);


        $pcategory = Category::findOrFail($id);

        $pcategory->name = $request->name;
        $pcategory->parent_id = $request->parent_id;
        $pcategory->description = $request->description;
        $pcategory->icon = $request->icon;
        $pcategory->order = $request->order;
        $pcategory->status = $request->status;
        $pcategory->is_main = $request->is_main;
        $pcategory->is_featured = $request->is_featured;
        $pcategory->slug = Category::generateSlug($request->name);

        // Upload icon image if available
        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            if ($file->isValid()) {
                $url = FileUpload::upload($file, "p_category");
                $pcategory->image = $url;
            } else {
                return redirect()->back()->withErrors(['icon_image' => 'Invalid icon image file']);
            }
        }

        // Upload background image if available
        if ($request->hasFile('background_image')) {
            $backgroundImageFile = $request->file('background_image');
            if ($backgroundImageFile->isValid()) {
                $backgroundImageUrl = FileUpload::upload($backgroundImageFile, "p_category");
                $pcategory->background_image = $backgroundImageUrl;
            } else {
                return redirect()->back()->withErrors(['background_image' => 'Invalid background image file']);
            }
        }
        $pcategory->background_color = $request->background_color;

        // Update the category
        if ($pcategory->save()) {
            // Redirect or return response as needed
            return redirect()->back()->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to save category']);
        }
    }


    public function delete_pcategory($id)
    {
        $pcategory = Category::findOrFail($id);

        $pcategory->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }




    // PRODUCT SECTION 
    public function store_product_old(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'content' => '',
            'images' => '',
            'sku' => '',
            'price' => '',
            'sale_price' => '',
            'cost_per_item' => '',
            'barcode' => '',
            'start_date' => '',
            'end_date' => '',
            'quantity' => '',
            'stock_status' => '',
            'weight' => '',
            'length' => '',
            'wide' => '',
            'height' => '',
            'has_product_options' => '',
            'related_products' => '',
            'cross_sale_products' => '',
            'layout' => '',
            'is_popular' => '',
            'status' => 'required|string',
            'store_id' => '',
            'is_featured' => '',
            'categories' => '',
            'brand_id' => '',
            'product_collections' => '',
            'product_labels' => '',
            'taxes' => '',
        ]);


        $product = new Product();
        $product->name = $request->name;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->slug = Product::generateSlug($request->name);
        // $product->images = $request->images;

        // Check if image file is present
        // if ($request->hasFile('images')) {
        //     $logo = $request->file('images');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/products', $logoName);
        //     $product->images = __DIR__ . "/storage/products/" . $logoName;
        // }

        // Check if image file is present
        // if ($request->hasFile('images')) {
        //     $logo = $request->file('images');
        //     $logoName = $logo->getClientOriginalName();
        //     $path = $logo->storeAs('public/products', $logoName);
        //     $url = Storage::url($path);
        //     $product->images = $url;
        // }


        // Updated code for image upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "products");

                $product->images = $url;
            }
        }

        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->cost_per_item = $request->cost_per_item;
        $product->barcode = $request->barcode;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->wide = $request->wide;
        $product->height = $request->height;
        $product->has_product_options = $request->has_product_options;
        $product->related_products = $request->related_products;
        $product->cross_sale_products = $request->cross_sale_products;
        $product->layout = $request->layout;
        $product->is_popular = $request->is_popular;
        $product->status = $request->status;
        $product->store_id = $request->store_id;
        $product->is_featured = $request->is_featured;
        $product->categories = $request->categories;
        $product->brand_id = $request->brand_id;
        $product->product_collections = $request->product_collections;
        $product->product_labels = $request->product_labels;
        $product->taxes = $request->taxes;

        $product->save();

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'content' => '',
            'images.*' => 'image|mimes:jpeg,png,jpg',
            'sku' => '',
            'price' => '',
            'sale_price' => '',
            'cost_per_item' => '',
            'start_date' => '',
            'end_date' => '',
            'with_storehouse_management' => '',
            'quantity' => '',
            'allow_checkout_when_out_of_stock' => '',
            'stock_status' => '',
            'weight' => '',
            'length' => '',
            'wide' => '',
            'height' => '',
            'attr_name' => '',
            'attr_value' => '',
            'global_option' => '',
            'option_name' => '',
            'option_value' => '',
            'related_products' => '',
            'cross_sale_products' => '',
            'faq_question' => '',
            'faq_answer' => '',
            'seo_title' => '',
            'seo_description' => '',
            'layout' => '',
            'is_popular' => '',
            'status' => '',
            'store_id' => '',
            'is_featured' => '',
            'categories' => '',
            'brand_id' => '',
            'featured_image' => 'image|mimes:jpeg,png,jpg',
            'product_collections' => '',
            'product_labels' => '',
            'taxes' => '',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->slug = Product::generateSlug($request->name);

        if ($request->hasFile('images')) {
            $fileUrls = [];
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $url = FileUpload::upload($file, "products");
                    $fileUrls[] = $url;
                }
            }
            $product->images = implode(',', $fileUrls);
        }

        if ($request->hasFile('featured_image')) {
            $featured_image_file = $request->file('featured_image');
            if ($featured_image_file->isValid()) {
                $featured_image_url = FileUpload::upload($featured_image_file, "products");
                $product->featured_image = $featured_image_url;
            }
        }

        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->cost_per_item = $request->cost_per_item;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->with_storehouse_management = $request->with_storehouse_management;
        $product->quantity = $request->quantity;
        $product->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock;
        $product->stock_status = $request->stock_status;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->wide = $request->wide;
        $product->height = $request->height;

        if ($request->attr_name == '') {
            $product->attr_name = $request->attr_name;
        } else {
            $product->attr_name = implode(',', $request->attr_name);
        }

        if ($request->attr_value == '') {
            $product->attr_value = $request->attr_value;
        } else {
            $product->attr_value = implode(',', $request->attr_value);
        }

        $product->global_option = $request->global_option;


        if ($request->option_name == '') {
            $product->option_name = $request->option_name;
        } else {
            $product->option_name = implode(',', $request->option_name);
        }

        if ($request->option_value == '') {
            $product->option_value = $request->option_value;
        } else {
            $product->option_value = implode(',', $request->option_value);
        }

        $product->related_products = $request->related_products;
        $product->cross_sale_products = $request->cross_sale_products;


        if ($request->faq_question == '') {
            $product->faq_question = $request->faq_question;
        } else {
            $product->faq_question = implode(',', $request->faq_question);
        }


        if ($request->faq_answer == '') {
            $product->faq_answer = $request->faq_answer;
        } else {
            $product->faq_answer = implode(',', $request->faq_answer);
        }

        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->layout = $request->layout;
        $product->is_popular = $request->is_popular;
        $product->status = $request->status;
        $product->store_id = $request->store_id;
        $product->is_featured = $request->is_featured;
        $product->categories = $request->categories;
        $product->brand_id = $request->brand_id;
        $product->product_collections = $request->product_collections;
        $product->product_labels = $request->product_labels;
        $product->taxes = $request->taxes;


        // dd($request);
        // exit;

        $product->save();

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    // Test function for image upload
    public function test(Request $request)
    {
        $request->validate([
            'single' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add appropriate validation rules
            'multiple.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for multiple images
        ]);

        $product = new ImageTest();

        if ($request->hasFile('single')) {
            $file = $request->file('single');
            if ($file->isValid()) {
                $url = FileUpload::upload($file, "imageTest");
                $product->single = $url; // Assuming 'single' is a field in the database for single image
            }
        }

        if ($request->hasFile('multiple')) {
            $fileUrls = [];
            foreach ($request->file('multiple') as $file) {
                if ($file->isValid()) {
                    $url = FileUpload::upload($file, "imageTest");
                    $fileUrls[] = $url;
                }
            }
            $product->multiple = implode(',', $fileUrls); // Assuming 'multiple' is a field in the database for multiple images
        }

        $product->save();

        return redirect()->back()->with('success', 'Images Uploaded!');
    }



    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'content' => '',
            'images.*' => 'image|mimes:jpeg,png,jpg',
            'sku' => '',
            'price' => '',
            'sale_price' => '',
            'cost_per_item' => '',
            'start_date' => '',
            'end_date' => '',
            'with_storehouse_management' => '',
            'quantity' => '',
            'allow_checkout_when_out_of_stock' => '',
            'stock_status' => '',
            'weight' => '',
            'length' => '',
            'wide' => '',
            'height' => '',
            'attr_name' => '',
            'attr_value' => '',
            'global_option' => '',
            'option_name' => '',
            'option_value' => '',
            'related_products' => '',
            'cross_sale_products' => '',
            'faq_question' => '',
            'faq_answer' => '',
            'seo_title' => '',
            'seo_description' => '',
            'layout' => '',
            'is_popular' => '',
            'status' => '',
            'store_id' => '',
            'is_featured' => '',
            'categories' => '',
            'brand_id' => '',
            'featured_image' => 'image|mimes:jpeg,png,jpg',
            'product_collections' => '',
            'product_labels' => '',
            'taxes' => '',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->slug = Product::generateSlug($request->name);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $url = FileUpload::upload($file, "products");
                    $productImage = new ProductImages();
                    $productImage->product_id = $product->id;
                    $productImage->images = $url;
                    $productImage->save();
                }
            }
        }

        if ($request->hasFile('featured_image')) {
            $featured_image_file = $request->file('featured_image');
            if ($featured_image_file->isValid()) {
                $featured_image_url = FileUpload::upload($featured_image_file, "products");
                $product->featured_image = $featured_image_url;
            }
        }

        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->cost_per_item = $request->cost_per_item;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->with_storehouse_management = $request->with_storehouse_management;
        $product->quantity = $request->quantity;
        $product->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock;
        $product->stock_status = $request->stock_status;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->wide = $request->wide;
        $product->height = $request->height;

        if ($request->attr_name) {
            $product->attr_name = implode(',', $request->attr_name);
        } else {
            $product->attr_name = $request->attr_name;
        }

        if ($request->attr_value) {
            $product->attr_value = implode(',', $request->attr_value);
        } else {
            $product->attr_value = $request->attr_value;
        }

        $product->global_option = $request->global_option;

        if ($request->option_name) {
            $product->option_name = implode(',', $request->option_name);
        } else {
            $product->option_name = $request->option_name;
        }

        if ($request->option_value) {
            $product->option_value = implode(',', $request->option_value);
        } else {
            $product->option_value = $request->option_value;
        }

        if ($request->faq_question) {
            $product->faq_question = implode(',', $request->faq_question);
        } else {
            $product->faq_question = $request->faq_question;
        }

        if ($request->faq_answer) {
            $product->faq_answer = implode(',', $request->faq_answer);
        } else {
            $product->faq_answer = $request->faq_answer;
        }

        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->layout = $request->layout;
        $product->is_popular = $request->is_popular;
        $product->status = $request->status;
        $product->store_id = $request->store_id;
        $product->is_featured = $request->is_featured;
        $product->categories = $request->categories;
        $product->brand_id = $request->brand_id;
        $product->product_collections = $request->product_collections;
        $product->product_labels = $request->product_labels;
        $product->taxes = $request->taxes;

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }



    public function delete_product($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }



    // PRODUCT TAG SECTION 
    public function store_tags(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'status' => 'required|string',
        ]);


        $tags = new ProductTags();
        $tags->name = $request->name;
        $tags->description = $request->description;
        $tags->status = $request->status;

        $tags->save();


        return redirect()->back()->with('success', 'Tag created successfully.');
    }

    public function update_tag(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);


        $tag = ProductTags::findOrFail($id);


        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->status = $request->status;


        $tag->save();

        return redirect()->back()->with('success', 'Tag updated successfully.');
    }

    public function delete_tag($id)
    {
        $tag = ProductTags::findOrFail($id);

        $tag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }



    // PRODUCT BRAND SECTION 
    public function store_brands(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'status' => '',
            'website' => '',
            'order' => '',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured' => '',
        ]);

        $brand = new Brands();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->website = $request->website;
        $brand->order = $request->order;

        // Check if logo file is present
        // if ($request->hasFile('logo')) {
        //     $logo = $request->file('logo');
        //     $logoName = $logo->getClientOriginalName(); // You may customize the filename as needed
        //     $logo->storeAs('public/logos', $logoName); // Store the logo in the storage folder, change 'logos' to your desired directory
        //     $brand->logo = $logoName; // Save the filename to the database
        // }


        // Updated code for image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "logos");

                $brand->logo = $url;
            }
        }

        $brand->featured = $request->featured;

        // dd($brand);

        $brand->save();

        return redirect()->back()->with('success', 'Brand created successfully.');
    }


    public function update_brand(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'status' => '',
            'website' => '',
            'order' => '',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // If logo is optional, you can remove this validation if you don't want to update logo every time.
            'featured' => '',
        ]);

        $brand = Brands::findOrFail($id);

        // Update other fields
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->website = $request->website;
        $brand->order = $request->order;
        $brand->featured = $request->featured;

        // Check if a new logo is uploaded
        // if ($request->hasFile('logo')) {
        //     // Delete old logo if it exists
        //     // if ($brand->logo) {
        //     //     Storage::delete('/public/app/logos/' . $brand->logo);
        //     // }

        //     // Store new logo
        //     $logo = $request->file('logo');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/logos', $logoName); // You might adjust the storage path as needed
        //     $brand->logo = $logoName;
        // }

        // Updated code for image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "logos");

                $brand->logo = $url;
            }
        }

        $brand->save();

        return redirect()->back()->with('success', 'Brand updated successfully.');
    }


    public function delete_brand($id)
    {
        $brand = Brands::findOrFail($id);

        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }



    // PRODUCT DISCOUNT SECTION 
    public function store_discounts(Request $request)
    {
        $request->validate([
            'code' => '',
            'title' => '',
            'discount_type' => '',
            'can_use_with_promotion' => '',
            'is_unlimited' => '',
            'quantity' => '',
            'type_option' => '',
            'value' => '',
            'target' => '',
            'start_date' => '',
            'start_time' => '',
            'end_date' => '',
            'end_time' => '',
            'unlimited_time' => '',
        ]);

        $pdiscount = new ProductDiscount();
        $pdiscount->code = $request->code;
        $pdiscount->title = $request->title;
        $pdiscount->discount_type = $request->discount_type;
        $pdiscount->can_use_with_promotion = $request->can_use_with_promotion;
        $pdiscount->is_unlimited = $request->is_unlimited;
        $pdiscount->quantity = $request->quantity;
        $pdiscount->type_option = $request->type_option;
        $pdiscount->value = $request->value;
        $pdiscount->target = $request->target;
        $pdiscount->start_date = $request->start_date;
        $pdiscount->start_time = $request->start_time;
        $pdiscount->end_date = $request->end_date;
        $pdiscount->end_time = $request->end_time;
        $pdiscount->unlimited_time = $request->unlimited_time;

        // dd($pdiscount);

        $pdiscount->save();

        return redirect()->back()->with('success', 'Discount created successfully.');
    }


    // public function update_discounts(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'description' => '',
    //         'status' => '',
    //         'website' => '',
    //         'order' => '',
    //         'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // If logo is optional, you can remove this validation if you don't want to update logo every time.
    //         'featured' => '',
    //     ]);

    //     $brand = Brands::findOrFail($id);

    //     // Update other fields
    //     $brand->name = $request->name;
    //     $brand->description = $request->description;
    //     $brand->status = $request->status;
    //     $brand->website = $request->website;
    //     $brand->order = $request->order;
    //     $brand->featured = $request->featured;

    //     // Check if a new logo is uploaded
    //     if ($request->hasFile('logo')) {
    //         // Delete old logo if it exists
    //         // if ($brand->logo) {
    //         //     Storage::delete('/public/app/logos/' . $brand->logo);
    //         // }

    //         // Store new logo
    //         $logo = $request->file('logo');
    //         $logoName = $logo->getClientOriginalName();
    //         $logo->storeAs('public/logos', $logoName); // You might adjust the storage path as needed
    //         $brand->logo = $logoName;
    //     }

    //     $brand->save();

    //     return redirect()->back()->with('success', 'Brand updated successfully.');
    // }


    public function delete_discounts($id)
    {
        $pdiscount = ProductDiscount::findOrFail($id);

        $pdiscount->delete();

        return redirect()->back()->with('success', 'Discount deleted successfully.');
    }





    // PRODUCT DISCOUNT SECTION 
    public function store_tax(Request $request)
    {
        $request->validate([
            'title' => '',
            'percentage' => '',
            'priority' => '',
            'status' => '',
        ]);

        $tax = new Taxes();
        $tax->title = $request->title;
        $tax->percentage = $request->percentage;
        $tax->priority = $request->priority;
        $tax->status = $request->status;

        // dd($tax);

        $tax->save();

        return redirect()->back()->with('success', 'Tax created successfully.');
    }


    public function update_tax(Request $request, $id)
    {
        $request->validate([
            'title' => '',
            'percentage' => '',
            'priority' => '',
            'status' => '',
        ]);

        $tax = Taxes::findOrFail($id);

        // Update other fields
        $tax->title = $request->title;
        $tax->percentage = $request->percentage;
        $tax->priority = $request->priority;
        $tax->status = $request->status;



        $tax->save();

        return redirect()->back()->with('success', 'Tax updated successfully.');
    }


    public function delete_tax($id)
    {
        $tax = Taxes::findOrFail($id);

        $tax->delete();

        return redirect()->back()->with('success', 'Tax deleted successfully.');
    }




    // PRODUCT COLLECTION SECTION 
    public function store_product_collection(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'slug' => '',
            'description' => '',
            'status' => '',
            'image' => '',
            'featured' => '',
        ]);


        $pcollection = new ProductCollection();
        $pcollection->name = $request->name;
        $pcollection->slug = $request->slug;
        $pcollection->description = $request->description;
        $pcollection->status = $request->status;

        // Check if image file is present
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $logoName = $logo->getClientOriginalName();
            $logo->storeAs('public/product_collections', $logoName);
            $pcollection->image = $logoName;
        }

        // Updated code for image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "product_collections");

                $pcollection->image = $url;
            }
        }

        $pcollection->featured = $request->featured;

        $pcollection->save();


        return redirect()->back()->with('success', 'Product Collection created successfully.');
    }

    public function update_product_collection(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'slug' => '',
            'description' => '',
            'status' => '',
            'image' => '',
            'featured' => '',
        ]);


        $pcollection = ProductCollection::findOrFail($id);

        $pcollection->name = $request->name;
        $pcollection->slug = $request->slug;
        $pcollection->description = $request->description;
        $pcollection->status = $request->status;
        $pcollection->featured = $request->featured;

        // Check if a new image is uploaded
        // if ($request->hasFile('image')) {

        //     $logo = $request->file('image');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/product_collections', $logoName);
        //     $pcollection->image = $logoName;
        // }

        // Updated code for image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "product_collections");

                $pcollection->image = $url;
            }
        }

        $pcollection->save();

        return redirect()->back()->with('success', 'Product Collection updated successfully.');
    }

    public function delete_product_collection($id)
    {
        $pcollection = ProductCollection::findOrFail($id);

        $pcollection->delete();

        return redirect()->back()->with('success', 'Product Collection deleted successfully.');
    }




    // PRODUCT LABEL SECTION 
    public function store_product_label(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'color' => '',
            'status' => '',
        ]);


        $plabel = new ProductLabel();
        $plabel->name = $request->name;
        $plabel->color = $request->color;
        $plabel->status = $request->status;

        $plabel->save();


        return redirect()->back()->with('success', 'Product Label created successfully.');
    }

    public function update_product_label(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'color' => '',
            'status' => '',
        ]);


        $plabel = ProductLabel::findOrFail($id);

        $plabel->name = $request->name;
        $plabel->color = $request->color;
        $plabel->status = $request->status;


        $plabel->save();

        return redirect()->back()->with('success', 'Product Label updated successfully.');
    }

    public function delete_product_label($id)
    {
        $plabel = ProductLabel::findOrFail($id);

        $plabel->delete();

        return redirect()->back()->with('success', 'Product Label deleted successfully.');
    }



    // PRODUCT FEAATURES SECTION 
    public function store_product_features(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'image' => '',
            'status' => '',
        ]);


        $pfeature = new ProductFeatures();
        $pfeature->name = $request->name;
        $pfeature->description = $request->description;
        // $pfeature->image = $request->image;

        // Check if image file is present
        // if ($request->hasFile('image')) {
        //     $logo = $request->file('image');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/product_features', $logoName);
        //     $pfeature->image = $logoName;
        // }

        // Updated code for image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "product_features");

                $pfeature->image = $url;
            }
        }

        $pfeature->status = $request->status;

        $pfeature->save();


        return redirect()->back()->with('success', 'Product Feature created successfully.');
    }

    public function update_product_features(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => '',
            'image' => '',
            'status' => '',
        ]);


        $pfeature = ProductFeatures::findOrFail($id);

        $pfeature->name = $request->name;
        $pfeature->description = $request->description;
        // $pfeature->image = $request->image;

        // Check if image file is present
        // if ($request->hasFile('image')) {
        //     $logo = $request->file('image');
        //     $logoName = $logo->getClientOriginalName();
        //     $logo->storeAs('public/product_features', $logoName);
        //     $pfeature->image = $logoName;
        // }

        // Updated code for image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {

                $logoName = $file->getClientOriginalName();
                $url = FileUpload::upload($file, "product_features");

                $pfeature->image = $url;
            }
        }

        $pfeature->status = $request->status;

        $pfeature->save();



        return redirect()->back()->with('success', 'Product Feature updated successfully.');
    }

    public function delete_product_features($id)
    {
        $pfeature = ProductFeatures::findOrFail($id);

        $pfeature->delete();

        return redirect()->back()->with('success', 'Product Feature deleted successfully.');
    }



    public function edit()
    {

        $title = "Carzex - Edit Product";

        // Add your admin dashboard logic here
        return view('admin.product.edit', ['title' => $title]);
    }

    public function delete()
    {
    }


    public function destroy_image(Request $request)
    {
        $imageId = $request->input('image_id');

        // Find the image by ID and delete it
        $image = ProductImages::findOrFail($imageId);
        if ($image) {
            // Delete the image from storage if needed
            // Example: Storage::delete('uploads/' . $image->images);
            Storage::delete('uploads/' . $image->images);

            // Delete the image record from database
            $image->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
