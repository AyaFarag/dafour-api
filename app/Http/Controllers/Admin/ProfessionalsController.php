<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddProfessionalRequest;
use App\Http\Requests\Admin\UpdateProfessionalRequest;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    public function index()
    {
        $professionals = Professional::all();

        return view('admin.professionals.index', compact('professionals'));
    }

    public function create()
    {
        return view('admin.professionals.create');
    }

    public function store(AddProfessionalRequest $request)
    {
        Professional::create($request->all());

        return redirect()->back()->with('success', 'Added successfully!');
    }

    public function edit(Professional $professional)
    {
        return view('admin.professionals.edit', compact('professional'));
    }

    public function update(UpdateProfessionalRequest $request, Professional $professional)
    {
        $professional->update($request->all());

        return redirect()->route('admin.professionals.index')->with('success', 'Updated successfully');
    }

    public function toggleBlock(Request $request)
    {
        $professional = Professional::find($request->get('professional'));

        if ($professional) {
            $professional->blocked = !$professional->blocked;
            $professional->save();
        }
    }

    public function destroy(Professional $professional)
    {
        $professional->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}