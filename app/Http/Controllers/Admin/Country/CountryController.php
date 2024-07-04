<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $title = "Carzex - Countries";

        $countryList = Country::all();


        // Return the view with the categories data
        return view('admin.country.index', ['title' => $title, 'country' => $countryList]);
    }

    public function create()
    {
        $title = "Carzex - New Country";


        // Return the view with the categories data
        return view('admin.country.add', ['title' => $title]);
    }

    public function edit($id)
    {

        $countrydetail = Country::findOrFail($id);
        $title = "Carzex - Edit " . $countrydetail->name;

        // Return the view with the categories data
        return view('admin.country.edit', ['title' => $title, 'country' => $countrydetail]);
    }

    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'iso' => '',
            'nationality' => '',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);

        // Create a new country instance
        $country = new Country();
        $country->name = $request->name;
        $country->iso = $request->iso;
        $country->nationality = $request->nationality;
        $country->order = $request->order;
        $country->is_default = $request->is_default;
        $country->status = $request->status;

        // Save the country to the database
        $country->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Country created successfully.');
    }

    public function update(Request $request, $id)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'iso' => '',
            'nationality' => '',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);


        $country = Country::findOrFail($id);

        $country->name = $request->name;
        $country->iso = $request->iso;
        $country->nationality = $request->nationality;
        $country->order = $request->order;
        $country->is_default = $request->is_default;
        $country->status = $request->status;

        // Save the country to the database
        $country->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Country updated successfully.');
    }


    public function delete($id)
    {

        $country = Country::findOrFail($id);

        $country->delete();

        return redirect()->back()->with('success', 'Country deleted successfully.');
    }
}