<?php

namespace App\Http\Controllers\Admin\States;

use App\Http\Controllers\Controller;
use App\Models\Country\Country;
use App\Models\State\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $title = "Carzex - States";

        // Fetch all countries and states
        $countryList = Country::all();
        $stateList = State::all();

        $countryNames = [];

        // Iterate over each state
        foreach ($stateList as $state) {
            // Find the corresponding country for the state
            $country = $countryList->where('id', $state->country)->first();

            // If the country is found, store its name
            if ($country) {
                $countryNames[$state->id] = $country->name;
            }
        }

        // dd($countryNames);

        // Return the view with the countries data
        return view('admin.states.index', ['title' => $title, 'country' => $countryNames, 'stateList' => $stateList]);
    }


    public function create()
    {
        $title = "Carzex - New states";

        $countryList = Country::all();

        // Return the view with the categories data
        return view('admin.states.add', ['title' => $title, 'country' => $countryList]);
    }

    public function edit($id)
    {

        $countryList = Country::all();
        $statedetail = State::findOrFail($id);
        $title = "Carzex - Edit " . $statedetail->name;

        // Return the view with the categories data
        return view('admin.states.edit', ['title' => $title, 'state' => $statedetail, 'country' => $countryList]);
    }

    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'abbrv' => '',
            'country' => 'required|string',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);

        // Create a new country instance
        $state = new State();
        $state->name = $request->name;
        $state->abbrv = $request->abbrv;
        $state->country = $request->country;
        $state->order = $request->order;
        $state->is_default = $request->is_default;
        $state->status = $request->status;

        // Save the country to the database
        $state->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'State created successfully.');
    }

    public function update(Request $request, $id)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'abbrv' => '',
            'country' => 'required|string',
            'order' => '',
            'is_default' => '',
            'status' => '',
        ]);


        $state = State::findOrFail($id);

        $state->name = $request->name;
        $state->abbrv = $request->abbrv;
        $state->country = $request->country;
        $state->order = $request->order;
        $state->is_default = $request->is_default;
        $state->status = $request->status;


        $state->save();

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'State updated successfully.');
    }


    public function delete($id)
    {

        $state = State::findOrFail($id);

        $state->delete();

        return redirect()->back()->with('success', 'State deleted successfully.');
    }
}