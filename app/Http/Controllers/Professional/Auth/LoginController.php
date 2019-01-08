<?php

namespace App\Http\Controllers\Professional\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\LogsoutUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\ProfessionalResource;

class LoginController extends Controller
{
    use AuthenticatesUsers, LogsoutUsers {
        LogsoutUsers::logout insteadof AuthenticatesUsers;
    }

    public function login(LoginRequest $request) {
        if (Auth::guard('professional')->attempt($request -> only("email", "password"))) {
            $user = Auth::guard('professional')->user();
            $user -> api_token = str_random(60);
            $user -> save();
            return response()->json(["message" => "login success"], 200);
            // return new ProfessionalResource($user);
        }
        return response()->json(["error" => "failed"], 401);
    }


}