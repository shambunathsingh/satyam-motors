<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index()
    {
        $title = "Carzex - invoices";

        // Fetch all orders with related product orders
        $orders = Order::with('productOrders')->get();

        // Calculate total amount for each order
        foreach ($orders as $order) {
            $totalAmount = $order->productOrders->sum(function ($productOrder) {
                return $productOrder->subtotal;
            });
            $order->totalAmount = $totalAmount;
        }

        // Return the view with the homepage data
        return view('admin.invoices.index', [
            'title' => $title,
            'orders' => $orders
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


    public function generatePdf()
    {
        $date = new DateTime();
        $formattedDate = $date->format('F d, Y');
        $formattedTime = $date->format('h:i:s a');

        $inv = 'test';
        $data = [
            'title' => 'Carzex - Car Depot',
            'invoice' => $inv,
            'date' => $formattedDate,
            'time' => $formattedTime,
        ];

        $pdf = Pdf::loadView('generate-invoice-pdf', $data);
        return $pdf->download('invoice-INV-' . $inv . '.pdf');
    }
}
