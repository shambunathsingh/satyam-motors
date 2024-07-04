<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ProductOrder\ProductOrder;
use App\Models\Order\Order;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'images',
        'sku',
        'price',
        'sale_price',
        'cost_per_item',
        'start_date',
        'end_date',
        'with_storehouse_management',
        'quantity',
        'allow_checkout_when_out_of_stock',
        'stock_status',
        'weight',
        'length',
        'wide',
        'height',
        'attr_name',
        'attr_value',
        'global_option',
        'option_name',
        'option_value',
        'related_products',
        'cross_sale_products',
        'faq_question',
        'faq_answer',
        'seo_title',
        'seo_description',
        'layout',
        'is_popular',
        'status',
        'store_id',
        'is_featured',
        'categories',
        'brand_id',
        'featured_image',
        'product_collections',
        'product_labels',
        'taxes',
        // Missing fields added below
        'post_parent',
        'post_excerpt',
        'parent_sku',
        'children',
        'downloadable',
        'virtual',
        'stock',
        'barcode',
        'has_product_options',
        'menu_order',
        'tax_class',
        'visibility',
        'author',
        'comment_status',
        'backorders',
        'sold_individually',
        'low_stock_amount',
        'manage_stock',
        'tax_status',
        'upsell_ids',
        'crosssell_ids',
        'purchase_note',
        'sale_price_dates_from',
        'sale_price_dates_to',
        'download_limit',
        'download_expiry',
        'product_url',
        'button_text',
        'downloadable_files',
        'product_page_url',
    ];
    


    public function category()
    {
        return $this->belongsTo(Category::class, 'categories', 'id');
    }

    public static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
