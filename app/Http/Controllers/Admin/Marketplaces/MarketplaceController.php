<?php

namespace App\Http\Controllers\Admin\Marketplaces;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketplaces\Store;
use App\Models\Country\Country;
use App\Models\Marketplaces\VendorInfo;

class MarketplaceController extends Controller
{
    public function Marketplacesreports()
    {
        $title = "Carzex - Reports";

        // Fetch all categories
        // Return the view with the categories data
        return view('admin.marketplaces.reports', ['title' => $title]);
    }
    // Display a listing of the resource.
    public function index()
    {
        $stores = Store::all();
        $title = 'Carzex - Stores List';
        return view('admin.marketplaces.stores.index', compact('title', 'stores'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $countryList = Country::all();

        $title = 'Create Store';

        return view('admin.marketplaces.stores.create', compact('title', 'countryList'));
    }
    public function datastore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:stores',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'customer_id' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate logo as an image file
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'required|string', // Changed to required as status should have a value
            'vendor_verified_at' => 'nullable|date',
            'zip_code' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName(); // Customize the filename
            $logo->storeAs('public/stores', $logoName); // Store the logo in the storage folder
            $validatedData['logo'] = $logoName; // Save the filename to the database
        }

        $store = Store::create($validatedData);

        return redirect()->back()->with('success', 'Store created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $store = Store::findOrFail($id);
        $title = 'Store Details';
        return view('admin.marketplaces.stores.show', compact('title', 'store'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $countryList = Country::all();
        $store = Store::findOrFail($id);
        $title = 'Edit Store';
        return view('admin.marketplaces.stores.edit', compact('title', 'store', 'countryList'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:stores,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'customer_id' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Added image validation
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'required|string',
            'vendor_verified_at' => 'nullable|date',
            'zip_code' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName(); // Customize the filename
            $logo->storeAs('public/stores', $logoName); // Store the logo in the storage folder
            $validatedData['logo'] = $logoName; // Save the filename to the database

            // Optionally delete the old logo if it exists
            // if ($store->logo && Storage::exists('public/stores/' . $store->logo)) {
            //     Storage::delete('public/stores/' . $store->logo);
            // }
        }

        $store->update($validatedData);

        return redirect()->back()->with('success', 'Store updated successfully.');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->back()->with('success', 'Store deleted successfully.');
    }

    // |===============================================================================================================================================================||=
    // |                                                                           VendorInfos                                                                         || 
    // |===============================================================================================================================================================||

    public function listVendorInfos()
    {
        // Load the related Customer data for each VendorInfo
        $vendorInfos = VendorInfo::with('customer')->get();
        $title = 'Vendor Info List';
        return view('admin.marketplaces.vendors.index', compact('title', 'vendorInfos'));
    }
    public function settings()
    {
        // Load the related Customer data for each VendorInfo
        $title = 'settings';
        return view('admin.marketplaces.settings', compact('title'));
    }

    public function showCreateForm()
    {
        $title = 'Create Vendor Info';
        return view('admin.marketplaces.vendors.create', compact('title'));
    }

    public function saveVendorInfo(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|integer',
            'balance' => 'required|numeric',
            'total_fee' => 'required|numeric',
            'total_revenue' => 'required|numeric',
            'signature' => 'nullable|string',
            'bank_info' => 'nullable|string',
            'payout_payment_method' => 'nullable|string',
            'tax_info' => 'nullable|string',
        ]);

        VendorInfo::create($validatedData);

        return redirect()->route('vendor-info.index')->with('success', 'Vendor Info created successfully.');
    }

    public function displayVendorInfo($id)
    {
        $vendorInfo = VendorInfo::findOrFail($id);
        $title = 'Vendor Info Details';
        return view('admin.marketplaces.vendors.show', compact('title', 'vendorInfo'));
    }

    public function showEditForm($id)
    {
        $vendorInfo = VendorInfo::findOrFail($id);
        $title = 'Edit Vendor Info';
        return view('admin.marketplaces.vendors.edit', compact('title', 'vendorInfo'));
    }

    public function updateVendorInfo(Request $request, $id)
    {
        $vendorInfo = VendorInfo::findOrFail($id);

        $validatedData = $request->validate([
            'customer_id' => 'required|integer',
            'balance' => 'required|numeric',
            'total_fee' => 'required|numeric',
            'total_revenue' => 'required|numeric',
            'signature' => 'nullable|string',
            'bank_info' => 'nullable|string',
            'payout_payment_method' => 'nullable|string',
            'tax_info' => 'nullable|string',
        ]);

        $vendorInfo->update($validatedData);

        return redirect()->route('vendor-info.index')->with('success', 'Vendor Info updated successfully.');
    }

    public function deleteVendorInfo($id)
    {
        $vendorInfo = VendorInfo::findOrFail($id);
        $vendorInfo->delete();

        return redirect()->route('vendor-info.index')->with('success', 'Vendor Info deleted successfully.');
    }

    public function analyzeVendorInfo()
    {
        $vendorData = VendorInfo::all();

        $totalBalance = $vendorData->sum('balance');
        $totalFees = $vendorData->sum('total_fee');
        $totalRevenue = $vendorData->sum('total_revenue');

        $payoutMethods = $vendorData->groupBy('payout_payment_method')->map(function ($row) {
            return $row->count();
        });

        $vendorsByCustomer = $vendorData->groupBy('customer_id')->map(function ($row) {
            return $row->count();
        });

        $title = 'Vendor Info Analysis';

        return view('admin.marketplaces.vendors.analysis', compact('title', 'totalBalance', 'totalFees', 'totalRevenue', 'payoutMethods', 'vendorsByCustomer'));
    }
}
