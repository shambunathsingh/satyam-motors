<?php

namespace App\Imports;

use App\Models\Product\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $product = Product::where('name', $row['name'])->first();

            $data = [
                'name' => $row['name'],
                'slug' => $row['slug'],
                'post_parent' => $row['post_parent'],
                'description' => $row['description'],
                'content' => $row['content'],
                'post_excerpt' => $row['post_excerpt'],
                'images' => $row['images'],
                'sku' => $row['sku'],
                'parent_sku' => $row['parent_sku'],
                'children' => $row['children'],
                'downloadable' => $row['downloadable'],
                'virtual' => $row['virtual'],
                'stock' => $row['stock'],
                'price' => $row['price'],
                'sale_price' => $row['sale_price'],
                'cost_per_item' => $row['cost_per_item'],
                'barcode' => $row['barcode'],
                'start_date' => $row['start_date'],
                'end_date' => $row['end_date'],
                'quantity' => $row['quantity'],
                'stock_status' => $row['stock_status'],
                'weight' => $row['weight'],
                'length' => $row['length'],
                'wide' => $row['wide'],
                'height' => $row['height'],
                'has_product_options' => $row['has_product_options'],
                'related_products' => $row['related_products'],
                'cross_sale_products' => $row['cross_sale_products'],
                'layout' => $row['layout'],
                'is_popular' => $row['is_popular'],
                'status' => $row['status'],
                'menu_order' => $row['menu_order'],
                'store_id' => $row['store_id'],
                'is_featured' => $row['is_featured'],
                'categories' => $row['categories'],
                'brand_id' => $row['brand_id'],
                'product_collections' => $row['product_collections'],
                'product_labels' => $row['product_labels'],
                'taxes' => $row['taxes'],
                'tax_class' => $row['tax_class'],
                'visibility' => $row['visibility'],
                'author' => $row['author'],
                'comment_status' => $row['comment_status'],
                'backorders' => $row['backorders'],
                'sold_individually' => $row['sold_individually'],
                'low_stock_amount' => $row['low_stock_amount'],
                'manage_stock' => $row['manage_stock'],
                'tax_status' => $row['tax_status'],
                'upsell_ids' => $row['upsell_ids'],
                'crosssell_ids' => $row['crosssell_ids'],
                'purchase_note' => $row['purchase_note'],
                'sale_price_dates_from' => $row['sale_price_dates_from'],
                'sale_price_dates_to' => $row['sale_price_dates_to'],
                'download_limit' => $row['download_limit'],
                'download_expiry' => $row['download_expiry'],
                'product_url' => $row['product_url'],
                'button_text' => $row['button_text'],
                'downloadable_files' => $row['downloadable_files'],
                'product_page_url' => $row['product_page_url'],
            ];

            if ($product) {
                $product->update($data);
            } else {
                Product::create($data);
            }
        }
    }
}
