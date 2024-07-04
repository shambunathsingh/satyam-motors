<?php

namespace App\Http\Controllers\Admin\FlashSales;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\ProductOrder\ProductOrder;
use App\Models\Flash_sales\Flash_sales;
use App\Models\flash_sale_products\flash_sale_products;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Log; // Import the Log facade

class FlashSalesController extends Controller
{
    public function store_flash_sales(Request $request)
    {
        // Validate request data
        $request->validate([
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'name' => 'required|string',
            'subtitle' => 'required|string',
            'end_date' => 'required|date',
            'status' => 'required|string'
        ]);

        try {
            // Create a new instance of FlashSale model
            $flashSale = new Flash_sales();
            // Fill the model with the validated request data
            $flashSale->name = $request->name;
            $flashSale->subtitle = $request->subtitle;
            $flashSale->end_date = $request->end_date;
            $flashSale->status = $request->status;
            // Save the FlashSale model to the database
            $flashSale->save();

            // Create a new instance of FlashSaleProduct model
            $flashSaleProduct = new flash_sale_products();
            // Fill the model with the validated request data
            $flashSaleProduct->flash_sale_id = $flashSale->id; // Get the id from the saved Flash_sale model
            $flashSaleProduct->product_id = $request->input('product_id');
            $flashSaleProduct->price = $request->input('price');
            $flashSaleProduct->quantity = $request->input('quantity');
            $flashSaleProduct->sold = 0; // Assuming default value for sold
            // Save the FlashSaleProduct model to the database
            $flashSaleProduct->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Flash sale created successfully.');
        } catch (\Exception $e) {
            // Return an error response in case of any exceptions
            return redirect()->back()->with('error', 'Failed to create flash sale: ' . $e->getMessage());
        }
    }



    public function search_flash_sales_products(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $products = Product::all(); // Fetch all products if query is empty
        } else {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('slug', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
        }

        return response()->json($products);
    }

    public function getProductDetails($product_id)
    {
        try {
            $product = Product::findOrFail($product_id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function update_flash_sales(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'subtitle' => '',
            'end_date' => 'required|date',
            'status' => 'required|string',
            'flash_sale_id' => 'required|integer',
            'product_id' => '',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        DB::beginTransaction();

        try {
            // Find the existing FlashSale record
            $flashSale = Flash_sales::findOrFail($id);
            // Update the FlashSale model with the validated request data
            $flashSale->name = $request->name;
            $flashSale->subtitle = $request->subtitle;
            $flashSale->end_date = $request->end_date;
            $flashSale->status = $request->status;
            // Save the updated FlashSale model to the database
            $flashSale->save();

            // Find the related FlashSaleProduct record
            $flashSaleProduct = flash_sale_products::where('flash_sale_id', $id)->firstOrFail();
            // Update the FlashSaleProduct model with the validated request data
            $flashSaleProduct->product_id = $request->input('product_id');
            $flashSaleProduct->price = $request->input('price');
            $flashSaleProduct->quantity = $request->input('quantity');
            // Save the updated FlashSaleProduct model to the database
            $flashSaleProduct->save();

            DB::commit();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Flash sale updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Return an error response in case of any exceptions
            return redirect()->back()->with('error', 'Failed to update flash sale: ' . $e->getMessage());
        }
    }

    public function delete_flash_sales($id)
    {
        $Flash_sales = Flash_sales::findOrFail($id);
        $Flash_sales->delete();

        return redirect()->back()->with('success', 'Flash sale deleted successfully.');
    }

    // Flash sales listing
    public function flash_sales()
    {
        $title = "Carzex - Flash Sales";

        $flash_sales_list = Flash_sales::all();

        return view('admin.ecommerce.flash_sales', compact('title', 'flash_sales_list'));
    }

    public function create_product_flash_sales()
    {
        $title = "Carzex - New Flash Sale";

        return view('admin.ecommerce.add_flash_sales', ['title' => $title]);
    }

    public function edit_product_flash_sales($id)
    {
        $title = "Carzex - Edit Flash Sale";
        $Flash_sales = Flash_sales::find($id);

        return view('admin.ecommerce.edit_flash_sales', compact('Flash_sales', 'title'));
    }
    // public function edit_product_flash_sales($id)
    // {
    //     $title = "Carzex - Edit Flash Sale";
    //     $flashSale = Flash_sales::with('products')->findOrFail($id); // Fetch flash sale with its products

    //     return view('admin.ecommerce.edit_flash_sales', compact('flash_sales', 'title'));
    // }

    public function update_product_flash_sales(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'subtitle' => 'required|string',
            'end_date' => 'required|date',
            'status' => 'required|string',
            'flash_sale_id' => 'required|integer',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        DB::beginTransaction();

        try {
            // Find the existing FlashSale record
            $flashSale = Flash_sales::findOrFail($id);
            // Update the FlashSale model with the validated request data
            $flashSale->name = $request->name;
            $flashSale->subtitle = $request->subtitle;
            $flashSale->end_date = $request->end_date;
            $flashSale->status = $request->status;
            // Save the updated FlashSale model to the database
            $flashSale->save();

            // Find the related FlashSaleProduct record
            $flashSaleProduct = flash_sale_products::where('flash_sale_id', $id)->firstOrFail();
            // Update the FlashSaleProduct model with the validated request data
            $flashSaleProduct->product_id = $request->input('product_id');
            $flashSaleProduct->price = $request->input('price');
            $flashSaleProduct->quantity = $request->input('quantity');
            // Save the updated FlashSaleProduct model to the database
            $flashSaleProduct->save();

            DB::commit();

            // Return success message
            return redirect()->back()->with('success', 'Flash sale updated successfully.');
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Return error message
            return redirect()->back()->with('error', 'Failed to update flash sale: ' . $e->getMessage());
        }
    }
}
