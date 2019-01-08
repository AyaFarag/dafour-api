<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LogsoutUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers, LogsoutUsers {
        LogsoutUsers::logout insteadof AuthenticatesUsers;
    }

    public $redirectTo = '/df-admin/home';

    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    public function logoutToPath()
    {
        return '/df-admin/login';
    }
    
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

}
