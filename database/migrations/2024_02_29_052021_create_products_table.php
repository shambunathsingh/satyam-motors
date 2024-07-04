<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('post_parent')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('post_excerpt')->nullable();
            $table->text('images')->nullable();
            $table->string('sku')->nullable();
            $table->string('parent_sku')->nullable();
            $table->string('children')->nullable();
            $table->string('downloadable')->nullable();
            $table->string('virtual')->nullable();
            $table->string('stock')->nullable();
            $table->string('price', 10, 2)->nullable();
            $table->string('sale_price', 10, 2)->nullable();
            $table->string('cost_per_item', 10, 2)->nullable();
            $table->string('barcode')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('with_storehouse_management')->nullable();
            $table->string('quantity')->nullable();
            $table->string('allow_checkout_when_out_of_stock')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('weight', 8, 2)->nullable();
            $table->string('length', 8, 2)->nullable();
            $table->string('wide', 8, 2)->nullable();
            $table->string('height', 8, 2)->nullable();
            $table->string('attr_name')->nullable();
            $table->string('attr_value')->nullable();
            $table->string('global_option')->nullable();
            $table->string('option_name')->nullable();
            $table->string('option_value')->nullable();
            $table->string('has_product_options')->nullable();
            $table->string('related_products')->nullable();
            $table->string('cross_sale_products')->nullable();
            $table->string('faq_question')->nullable();
            $table->string('faq_answer')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('layout')->nullable();
            $table->string('is_popular')->nullable();
            $table->string('status')->nullable();
            $table->string('menu_order')->nullable();
            $table->string('store_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('is_featured')->nullable();
            $table->string('categories')->nullable();
            $table->string('brand_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->string('product_collections')->nullable();
            $table->string('product_labels')->nullable();
            $table->string('taxes')->nullable();
            $table->string('tax_class')->nullable();
            $table->string('visibility')->nullable();
            $table->string('author')->nullable()->constrained('users')->onDelete('set null');
            $table->string('comment_status')->nullable();
            $table->string('backorders')->nullable();
            $table->string('sold_individually')->nullable();
            $table->string('low_stock_amount')->nullable();
            $table->string('manage_stock')->nullable();
            $table->string('tax_status')->nullable();
            $table->string('upsell_ids')->nullable();
            $table->string('crosssell_ids')->nullable();
            $table->text('purchase_note')->nullable();
            $table->string('sale_price_dates_from')->nullable();
            $table->string('sale_price_dates_to')->nullable();
            $table->string('download_limit')->nullable();
            $table->string('download_expiry')->nullable();
            $table->string('product_url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('downloadable_files')->nullable();
            $table->string('product_page_url')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
