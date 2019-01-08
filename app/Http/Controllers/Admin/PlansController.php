<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPlanRequest;
use App\Http\Requests\Admin\UpdatePlanRequest;
use App\Models\Plan;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(AddPlanRequest $request)
    {
        $plans = Plan::all()->count();
        
        if ($plans >= 3) {
            return redirect()->back()->with('error', 'Can\'t have more than three plans! Please delete a plan before adding another.');
        }

        if (Plan::create($request->all())) {
            return redirect()->route('admin.plans.index')->with('success', 'Plan created successully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        if ($plan->update($request->all())) {
            return redirect()->route('admin.plans.index')->with('success', 'Plan edited successfully!');
        }

        return redirect()->back()->with('error', 'Server error, try again!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}
