<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $title = "Carzex - Customers";

        $allcustomers = Customer::all();

        // dd($allcustomers);
        // exit;

        return view('admin.customer.index', ['customers' => $allcustomers, 'title' => $title]);
    }

    public function edit($id)
    {

        $customerdetail = Customer::findOrFail($id);

        $title = "Carzex - Edit Customer" . $customerdetail->name;
        // dd($allcustomers);
        // exit;

        return view('admin.customer.edit', ['customer' => $customerdetail, 'title' => $title]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => '',
            'phone' => '',
            'dob' => '',
            'password' => '',
            'cpassword' => '',
            'privatenotes' => '',
            'status' => '',
        ]);

        // dd($request);
        // exit;


        $customer = Customer::findOrFail($id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->dob = $request->dob;

        if ($request->password == $request->cpassword) {
            $customer->password = $request->cpassword;
        }
        $customer->privatenotes = $request->privatenotes;
        $customer->status = $request->status;

        // Save the country to the database
        $customer->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Customer updated successfully.');
    }
}
