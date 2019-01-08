<?php

namespace App\Http\Controllers\Professional\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public $redirectTo = '/p/home';

    public function __construct()
    {
        $this->middleware('professional.guest');
    }

    public function broker()
    {
        return Password::broker('professionals');
    }

    public function guard()
    {
        return Auth::guard('professional');
    }

    public function resetPassword($token, ResetPasswordRequest $request) {

        $isEmail = filter_var($request -> input("login"), FILTER_VALIDATE_EMAIL);
        if ($isEmail) {
            $user  = User::whereEmail($request -> input("login")) -> firstOrFail();
            $phone = $user -> phones() -> first();
            $passwordReset = PasswordReset::wherePhone($phone -> phone) -> first();
        } else {
            $passwordReset = PasswordReset::wherePhone($request -> input("login")) -> first();
        }
        if ($passwordReset && Hash::check($token, $passwordReset -> token)) {        
            if (!$isEmail) {
                $user = UserPhone::wherePhone($request -> input("login")) -> first() -> user;
            }
            $user -> password = $request -> input("password");
            $user -> save();
            $passwordReset -> delete();
            
            return response() -> json(["message" => trans("api.reset_successfully")], 200);
        }
        return response() -> json(["error" => trans("api.invalid_token")], 403);
    }

}
