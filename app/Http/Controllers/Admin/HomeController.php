<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHomePage()
    {
        return view('admin.home');
    }
}