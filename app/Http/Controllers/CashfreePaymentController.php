<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\ProductOrder\ProductOrder;
use App\Models\Cart\Cart;
use App\Models\Product\Product;
use Craftsys\Msg91\Facade\Msg91;

class CashfreePaymentController extends Controller
{

    private function generateOrderNumber()
    {
        return strtoupper(Str::random(10)); // Generate a 10-character random string
    }

    public function create(Request $request)
    {
        return view('front.payment.payment-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'mobile' => 'required',
            'amount' => 'required'
        ]);

        $url = "https://sandbox.cashfree.com/pg/orders";

        $headers = array(
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: " . env('CASHFREE_API_KEY'),
            "x-client-secret: " . env('CASHFREE_API_SECRET')
        );

        $data = json_encode([
            'order_id' =>  'order_' . rand(1111111111, 9999999999),
            'order_amount' => $validated['amount'],
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => 'customer_' . rand(111111111, 999999999),
                "customer_name" => $validated['name'],
                "customer_email" => $validated['email'],
                "customer_phone" => $validated['mobile'],
            ],
            "order_meta" => [
                "return_url" => 'http://127.0.0.1:8000/cashfree/payments/success/?order_id={order_id}&order_token={order_token}'
            ]
        ]);

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $resp = curl_exec($curl);

        if ($resp === false) {
            // cURL error occurred
            $error = curl_error($curl);
            curl_close($curl);
            return back()->withInput()->withErrors(["cURL Error: $error"]);
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode !== 200) {
            // Request failed
            curl_close($curl);
            return back()->withInput()->withErrors(["Request failed with HTTP code $httpCode"]);
        }

        curl_close($curl);

        // Parse response
        $responseData = json_decode($resp);

        if (!$responseData || !isset($responseData->payment_link)) {
            // Response data or payment link not found
            return back()->withInput()->withErrors("Failed to retrieve payment link");
        }

        return redirect()->to($responseData->payment_link);
    }


    public function success(Request $request)
    {
        // Retrieve cart items from session
        $cartItems = session('cart');
        $requestData = $request->all();
        if (isset($requestData)) {
            // Retrieve authenticated customer's ID
            $customerId = Auth::guard('customer')->user()->id;
            $customerPhone = Auth::guard('customer')->user()->phone;

            // Calculate total amount
            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['subtotal'];
            }
            // $latestOrder = Order::latest()->first();
            $latestOrderId = $this->generateOrderNumber();

            // $latestOrderId = $latestOrder->id;

            // Save product order details
            foreach ($cartItems as $item) {
                $productOrder = new ProductOrder();
                $productOrder->order_id = $latestOrderId; // Use the latest order ID
                $productOrder->product_id = $item['productId'];
                $productOrder->quantity = $item['quantity'];
                $productOrder->subtotal = $item['subtotal'];
                $productOrder->payment_id = substr($requestData['order_id'], 6);
                $productOrder->order_token = $requestData['order_token']; // This line seems unnecessary
                $productOrder->save();

                // Remove product from cart database
                Cart::where('customer_id', $customerId)
                    ->where('product_id', $item['productId'])
                    ->delete();
            }

            // Send SMS

            // Prepare the payload
            $payload = [
                'template_id' => '651d0de9d6fc051c78783042',
                'short_url' => 1, // Change to 1 for On or 0 for Off
                'recipients' => [
                    [
                        'mobiles' => '91' . $customerPhone,
                        'var1' => $latestOrderId
                        // 'var1' => "testing111222"
                    ]
                ]
            ];

            // dd($validatedData, $payload);
            // exit;
            // Initialize Curl
            $curl = curl_init();

            // Set Curl options
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://control.msg91.com/api/v5/flow/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payload), // Encode payload as JSON
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authkey: 106071AD1N8jXrZ45f78cafcP1",
                    "content-type: application/json"
                ],
            ]);

            // Execute Curl request
            $response = curl_exec($curl);
            $err = curl_error($curl);

            // Close Curl
            curl_close($curl);

            // Clear cart session
            $request->session()->forget('cart');
            session(['cartCount' => 0]);

            // Redirect to the "thank you" page with success message
            return redirect()->route('thankyou')->with('success', 'Payment successful');
        }
    }
}
