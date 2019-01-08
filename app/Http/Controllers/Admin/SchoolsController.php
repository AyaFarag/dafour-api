<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSchoolRequest;
use App\Http\Requests\Admin\UpdateSchoolRequest;
use App\Models\Location;
use App\Models\School;

class SchoolsController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('admin.schools.index', compact('schools'));
    }

    public function create()
    {
        $locations = Location::pluck('title_en', 'id')->all();
        return view('admin.schools.create', compact('locations'));
    }

    public function store(AddSchoolRequest $request)
    {
        if (School::create($request->all())) {
            return redirect()->route('admin.schools.index')->with('success', 'School created successully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function edit(School $school)
    {
        $locations = Location::pluck('title_en', 'id')->all();
        return view('admin.schools.edit', compact('school', 'locations'));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        if ($school->update($request->all())) {
            return redirect()->route('admin.schools.index')->with('success', 'School edited successfully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}
