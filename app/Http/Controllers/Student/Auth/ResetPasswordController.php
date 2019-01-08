<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public $redirectTo = '/s/home';

    public function __construct()
    {
        $this->middleware('student.guest');
    }

    public function showResetForm(Request $request, $token)
    {
        // return view('');
    }

    public function broker()
    {
        return Password::broker('student');
    }
}
