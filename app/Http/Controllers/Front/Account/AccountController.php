<?php

namespace App\Http\Controllers\Front\Account;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {

        $title = 'My Account';

        return view('front.myaccount', ['title' => $title]);
    }
    public function updateprofile(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255', // Changed to nullable to allow optional updates
            'status' => 'required|string',
            'privatenotes' => 'nullable|string', // Added string validation rule
        ]);

        $customer = Customer::findOrFail($id);

        $customer->address = $request->input('address');
        // $customer->privatenotes = $request->textarea('privatenotes');
        // Find the customer by ID

        // Update customer data
        $customer->update($validatedData);
        return redirect()->back()->with('success', 'updated successful.');
    }
    public function overview()
    {
        $title = 'My overview';
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            // Redirect to the login page if the customer is not authenticated
            return redirect()->route('myaccount');
        }

        // Assuming you have a relationship set up in your Order model to load ProductOrder
        $orders = $customer->orders()->with('productOrders')->get();

        // Calculate total subtotal for each order
        foreach ($orders as $order) {
            $order->total_subtotal = $order->productOrders->sum('subtotal');
        }


        return view('front.overview', ['title' => $title, 'orders' => $orders]);
    }
    public function register()
    {

        $title = 'Register';

        return view('front.register', ['title' => $title]);
    }
    public function adminCustomer()
    {
        $title = 'Carzex - customer';
        $customers = Customer::all();  // Fetch all customers or specific ones based on your requirements

        return view('admin.customer.customer', ['title' => $title, 'customers' => $customers]);
    }
    public function editCustomer($id)
    {
        $title = "Carzex - Edit customer";
        $editCustomer = Customer::find($id);

        return view('admin.customer.edit_customer', compact('editCustomer', 'title'));
    }
    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6|confirmed',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
        ]);

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->dob = $request->input('dob');

        if ($request->filled('password')) {
            $customer->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $customer->image = $path;
        }

        $customer->save();

        return redirect()->route('admincustomer')->with('success', 'Customer updated successfully');
    }
    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            return redirect()->route('admincustomer')->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->route('admincustomer')->with('error', 'Customer not found.');
        }
    }


    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'password' => 'required'
        ]);

        // dd($request);
        // exit;

        // $user = Customer::create([
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        // event(new Registered($user));

        return redirect()->back()->with('success', 'Registration successful.');
        // return redirect()->route('myaccount')->with('success', 'Registration successful. You are now logged in.');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'phone', 'password');

        // dd($credentials);
        // exit;

        if (Auth::guard('customer')->attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/')->with('success', 'You are now logged in.');
        } else {
            // Check if it's a guest login attempt
            if ($request->has('guest_login')) {
                // Create a random guest ID
                $guestId = Str::random(10);

                // You may want to store the guest ID in the session or somewhere else for further use
                session(['guest_id' => $guestId]);

                // Proceed with guest login
                Auth::loginUsingId($guestId);

                return redirect()->intended('/');
            } else {
                // Regular login attempt failed
                return redirect()->route('myaccount')->with('error', 'Invalid credentials. Please try again.');
            }
        }
    }

    public function guestlogin(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        // Check if the phone number already exists
        $existingCustomer = Customer::where('phone', $request->phone)->first();
        if ($existingCustomer) {
            // If phone number exists, return an error
            return redirect()->back()->with('error', 'Phone number already exists. Please log in or use a different phone number.');
        }

        // Create a random guest ID
        $guestId = Str::random(10);

        // Save the guest credentials in the customer table
        Customer::create([
            'guest_id' => $guestId,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            // if ($request->has('phone')) {
            // You may want to store the guest ID in the session or somewhere else for further use
            session(['guest_id' => $guestId]);

            // Proceed with guest login
            return redirect()->intended('/')->with('success', 'You are now logged in.');
        } else {
            // Regular login attempt failed
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        // return redirect('auth.login');
        return redirect()->route('home')->with('success', 'Logout successful.');
    }
}
