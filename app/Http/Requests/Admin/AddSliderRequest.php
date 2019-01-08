<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AddSliderRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user() instanceof Admin;
    }

    public function rules()
    {
        return [
            'image' => 'required|mimes:jpeg,png',
        ];
    }
}