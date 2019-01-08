<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddLocationRequest;
use App\Http\Requests\Admin\UpdateLocationRequest;
use App\Models\Location;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(AddLocationRequest $request)
    {
        $locations = Location::all()->count();
        
        if ($locations >= 3) {
            return redirect()->back()->with('error', 'Can\'t have more than three locations! Please delete a location before adding another.');
        }

        if (Location::create($request->all())) {
            return redirect()->route('admin.locations.index')->with('success', 'Location created successully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        if ($location->update($request->all())) {
            return redirect()->route('admin.locations.index')->with('success', 'location edited successfully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function destroy($location)
    {
        $location = Location::findOrFail($location);
        
        if ($location->delete()) {
            return redirect()->back()->with('success', 'Deleted successfully!');
        }

        return redirect()->back()->with('error', 'Server Error!');

    }   
}
