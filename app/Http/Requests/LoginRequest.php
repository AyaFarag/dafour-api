<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "email"        => "required",
            "password"     => "required",
            "device_token" => "nullable"
        ];
    }

    public function requestAttributes() {
        return [
            "email",
            "password",
            "device_token"
        ];
    }
}
