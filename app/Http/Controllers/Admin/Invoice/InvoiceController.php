<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\ExtProductImage;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\ProductImages\ProductImages;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index()
    {
        $title = "Satyam Motors | Invoices";

        $allproducts = Product::all();

        // Return the view with the homepage data
        return view('admin.invoices.index', [
            'title' => $title,
            'products' => $allproducts
        ]);
    }
    public function invoice_template()
    {
        $title = "Carzex - invoice-template";

        // Return the view with the homepage data
        return view('admin.invoices.invoice_template', [
            'title' => $title,
        ]);
    }
    public function edit_invoices($id)
    {
        $title = "Carzex - Edit Order";
        $edit_invoices = Order::with('productOrders')->find($id);

        if (!$edit_invoices) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        return view('admin.invoices.edit_invoices', compact('edit_invoices', 'title'));
    }


    public function download_invoices($id)
    {

        $editOrder = Order::with('productOrders')->find($id);
        $name = $editOrder->first_name . $editOrder->last_name;
        $email = $editOrder->email;
        $phone = $editOrder->phone;
        $address = $editOrder->street_address . "," . $editOrder->town_city . "," . $editOrder->state . "," . $editOrder->pin_code;
        $invno = $editOrder->order_id;

        $subtotal = $editOrder->productOrders->sum('subtotal');
        $productDetails = $editOrder->productOrders;

        $date = new DateTime();
        $formattedDate = $date->format('F d, Y');
        $formattedTime = $date->format('h:i:s a');

        $inv = 'test';
        $data = [
            'title' => 'Invoice',
            'invoice' => $invno,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'subtotal' => $subtotal,
            'pdetails' => $productDetails,
            'date' => $formattedDate,
            'time' => $formattedTime,
        ];

        // dd($editOrder, $data);
        // exit;

        $pdf = Pdf::loadView('generate-invoice-pdf', $data);
        return $pdf->download('invoice-INV-' . $name . '.pdf');
    }

    public function showPdf($id): Response
    {

        $editOrder = Order::with('productOrders')->find($id);
        $name = $editOrder->first_name . $editOrder->last_name;
        $email = $editOrder->email;
        $phone = $editOrder->phone;
        $address = $editOrder->street_address . "," . $editOrder->town_city . "," . $editOrder->state . "," . $editOrder->pin_code;
        $invno = $editOrder->order_id;

        $subtotal = $editOrder->productOrders->sum('subtotal');
        $productDetails = $editOrder->productOrders;

        $date = new DateTime();
        $formattedDate = $date->format('F d, Y');
        $formattedTime = $date->format('h:i:s a');

        $inv = 'test';
        $data = [
            'title' => 'Invoice',
            'invoice' => $invno,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'subtotal' => $subtotal,
            'pdetails' => $productDetails,
            'date' => $formattedDate,
            'time' => $formattedTime,
        ];

        $pdf = Pdf::loadView('generate-invoice-pdf', $data);
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice-INV-' . $name . '.pdf"',
        ]);
    }


    public function generatePdf($id)
    {
        $logo = (asset('/images/Capture-removebg-preview.png'));

        $product = Product::findOrFail($id);

        $intProductImages = ProductImages::where('product_id', $id)->get();
        $extProductImages = ExtProductImage::where('product_id', $id)->get();

        $productCategories = Category::where('id', $product->categories)->pluck('name');
        // Assuming that intProductImages and extProductImages need to be passed to the view
        $internalImages = $intProductImages->map(function ($image) {
            return asset('uploads/' . $image->images); // Adjust the path as necessary
        })->toArray();

        $externalImages = $extProductImages->map(function ($image) {
            return asset('uploads/' . $image->images); // Adjust the path as necessary
        })->toArray();

        $date = new DateTime();
        $formattedDate = $date->format('F d, Y');
        $formattedTime = $date->format('h:i a');

        $inv = $product->name;
        $data = [
            'title' => 'Satyam Motors - Invoice',
            'invoice' => $inv,
            'date' => $formattedDate,
            'time' => $formattedTime,
            'product' => $product,
            'category' => $productCategories,
            'logo' => $logo,
            'internalImages' => $internalImages,
            'externalImages' => $externalImages,
        ];

        // dd($data);
        // exit;
        
        return view('generate-invoice-pdf', $data);

        // $pdf = Pdf::loadView('generate-invoice-pdf', $data);
        // return $pdf->stream('Vehicle-Details-' . $inv . '.pdf');
    }
}
