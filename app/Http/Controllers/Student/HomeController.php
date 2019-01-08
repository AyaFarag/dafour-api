<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHomePage()
    {
        $user = auth()->user();

        return response() -> json(compact("user"));

        // return view('student.home', ['user' => auth()->user()]);
    }
}
