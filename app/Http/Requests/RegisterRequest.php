<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|max:191',
            'middle_name' => 'sometimes|max:191',
            'last_name' => 'required|max:191',
            'degree' => 'required|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|min:6|max:191|confirmed',
            'country' => 'required|max:2|min:2',
            'phone' => 'sometimes|max:191',
        ];
    }

    public function requestAttributes() {
        return [
            "first_name",
            "middle_name",
            "last_name",
            "degree",
            "email",
            "password",
            "country",
            "phone"
        ];
    }
}
