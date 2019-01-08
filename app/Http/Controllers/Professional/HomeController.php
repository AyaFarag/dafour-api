<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHomePage()
    {
        $user = auth()->user()->load('papers.downloads');

        // return view('professional.home', compact('user'));
        return response() -> json(compact("user"));
    }
}