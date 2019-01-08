<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LogsoutUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudentResource;

class LoginController extends Controller
{
    use AuthenticatesUsers, LogsoutUsers {
        LogsoutUsers::logout insteadof AuthenticatesUsers;
    }

    public function login(Request $request) {
        if (Auth::guard('student')->attempt($request -> only("email", "password"))) {
            $user = Auth::user();
            $user -> api_token = str_random(60);
            $user -> save();
            return new StudentResource($user);
        }
        return response()->json(["error" => trans("auth.failed")], 401);
    }
}
