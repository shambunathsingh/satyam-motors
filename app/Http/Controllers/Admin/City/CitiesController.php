<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\State\State;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $title = "Carzex - Cities";

        // Fetch all cities
        $cityList = City::all();

        // Fetch all states
        $stateList = State::all()->keyBy('id');

        // Fetch all countries
        $countryList = Country::all()->keyBy('id');

        // Array to store state names indexed by city id
        $stateNames = [];

        // Array to store country names indexed by city id
        $countryNames = [];

        // Iterate over each city
        foreach ($cityList as $city) {
            // Find the corresponding state for the city
            $state = $stateList->get($city->state_id);

            // Find the corresponding country for the state
            if ($state) {
                $country = $countryList->get($state->country_id);

                // If the country is found, store its name
                if ($country) {
                    $countryNames[$city->id] = $country->name;
                }
            }

            // If the state is found, store its name
            if ($state) {
                $stateNames[$city->id] = $state->name;
            }
        }

        // Return the view with the city, state, and country data
        return view('admin.city.index', compact('title', 'cityList', 'stateNames', 'countryNames'));
    }


    public function create()
    {
        $title = "Carzex - New City";

        $stateList = State::all();
        $countryList = Country::all();

        // Return the view with the categories data
        return view('admin.city.add', ['title' => $title], ['states' => $stateList, 'countries' => $countryList]);
    }

    public function edit($id)
    {

        $citydetail = City::findOrFail($id);
        $title = "Carzex - Edit " . $citydetail->name;

        $stateList = State::all();
        $countryList = Country::all();

        // Return the view with the categories data
        return view('admin.city.edit', ['title' => $title], ['city' => $citydetail, 'states' => $stateList, 'countries' => $countryList]);
    }

    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'country' => '',
            'state' => '',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);

        // Create a new country instance
        $city = new City();
        $city->name = $request->name;
        $city->country = $request->country;
        $city->state = $request->state;
        $city->order = $request->order;
        $city->is_default = $request->is_default;
        $city->status = $request->status;

        // Save the country to the database
        $city->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'City created successfully.');
    }

    public function update(Request $request, $id)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'country' => '',
            'state' => '',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);


        $city = City::findOrFail($id);

        $city->name = $request->name;
        $city->country = $request->country;
        $city->state = $request->state;
        $city->order = $request->order;
        $city->is_default = $request->is_default;
        $city->status = $request->status;

        // Save the country to the database
        $city->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'City updated successfully.');
    }


    public function delete($id)
    {

        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->back()->with('success', 'City deleted successfully.');
    }
}
