<?php

namespace App\Http\Controllers\Professional\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('professional.guest');
    }

    public function broker()
    {
        return Password::broker('professionals');
    }

    public function forgetPassword(ForgetPasswordRequest $request) {
        
        if (filter_var($request -> input("login"), FILTER_VALIDATE_EMAIL)) {
            $user  = User::whereEmail($request -> input("login")) -> firstOrFail();
            $phone = $user -> phones() -> first();
        } else {
            $phone = UserPhone::wherePhone($request -> input("login")) -> firstOrFail();
        }
        if (!$phone || $phone -> confirmation_code !== $request -> input("code"))
            return response() -> json(["error" => trans("api.invalid_code")], 403);
        $token = event(new ForgetPassword($phone -> user, $phone))[0];
        
        return response() -> json(compact("token"));
    }
}
