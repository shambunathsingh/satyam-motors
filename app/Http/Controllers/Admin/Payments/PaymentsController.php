<?php

namespace App\Http\Controllers\Admin\Payments;

use App\Http\Controllers\Controller;
use App\Models\Payments\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order\Order;
use App\Models\ProductOrder\ProductOrder;


class PaymentsController extends Controller
{
    public function payments()
    {
        $title = "Carzex - Payments";
        $payments = ProductOrder::all();
        $orders = [];

        foreach ($payments as $payment) {
            $orders[$payment->id] = Order::find($payment->order_id);
        }
        // dd($orders);
        return view('admin.payments.payments', compact('title', 'payments', 'orders'));
    }

public function methods()
    {
        $title = "Carzex - Methods";
        $payments = ProductOrder::all();
        // $orders = [];

        // foreach ($payments as $payment) {
        //     $orders[$payment->id] = Order::find($payment->order_id);
        // }
        // dd($orders);
        return view('admin.payments.methods', compact('title'));
    }
  public function edit_product_payments($id)
{
    $title = "Carzex - Edit Payment";
    $payments = ProductOrder::find($id);

    if (!$payments) {
        // Handle the case where the payment is not found.
        abort(404, 'Payment not found');
    }

    $order = Order::find($payments->order_id);
    return view('admin.payments.edit_payment', compact('payments', 'title', 'order'));
}


    // public function update_product_payments(Request $request, $id)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'currency' => 'required|string',
    //         'user_id' => 'required|integer',
    //         'charge_id' => 'required|string',
    //         'payment_channel' => 'required|string',
    //         'description' => 'required|string',
    //         'amount' => 'required|numeric',
    //         'order_id' => 'required|integer',
    //         'status' => 'required|string',
    //         'payment_type' => 'required|string',
    //         'customer_id' => 'required|integer',
    //         'refunded_amount' => 'required|numeric',
    //         'refund_note' => 'nullable|string',
    //         'customer_type' => 'required|string',
    //         'metadata' => 'nullable|string'
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         // Find the existing Payment record
    //         $payment = Payments::findOrFail($id);

    //         // Update the Payment model with the validated request data
    //         $payment->currency = $request->currency;
    //         $payment->user_id = $request->user_id;
    //         $payment->charge_id = $request->charge_id;
    //         $payment->payment_channel = $request->payment_channel;
    //         $payment->description = $request->description;
    //         $payment->amount = $request->amount;
    //         $payment->order_id = $request->order_id;
    //         $payment->status = $request->status;
    //         $payment->payment_type = $request->payment_type;
    //         $payment->customer_id = $request->customer_id;
    //         $payment->refunded_amount = $request->refunded_amount;
    //         $payment->refund_note = $request->refund_note;
    //         $payment->customer_type = $request->customer_type;
    //         $payment->metadata = $request->metadata;

    //         // Save the updated Payment model to the database
    //         $payment->save();

    //         DB::commit();

    //         // Return success message
    //         return redirect()->back()->with('success', 'Payment updated successfully.');
    //     } catch (\Exception $e) {
    //         // Rollback transaction
    //         DB::rollBack();

    //         // Return error message
    //         return redirect()->back()->with('error', 'Failed to update payment: ' . $e->getMessage());
    //     }
    // }
}
