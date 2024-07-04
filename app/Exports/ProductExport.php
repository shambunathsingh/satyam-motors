<?php

namespace App\Exports;

use App\Models\Product\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'name',
            'description',
            'content',
            'images',
            'sku',
            'price',
            'sale_price',
            'cost_per_item',
            'barcode',
            'start_date',
            'end_date',
            'quantity',
            'stock_status',
            'weight',
            'length',
            'wide',
            'height',
            'has_product_options',
            'related_products',
            'cross_sale_products',
            'layout',
            'is_popular',
            'status' => 'required|string',
            'store_id',
            'is_featured',
            'categories',
            'brand_id',
            'product_collections',
            'product_labels',
            'taxes',
        ];
    }
}
