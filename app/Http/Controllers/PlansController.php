<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function show(Plan $plan)
    {
        return view('subscribe', $plan);
    }

    public function subscribe(Request $request)
    {
        dd('Subscription is not supported yet');
    }
}