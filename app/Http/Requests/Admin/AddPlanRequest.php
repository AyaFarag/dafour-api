<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AddPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() instanceof Admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_en' => 'required|max:191',
            'title_ar' => 'required|max:191',
            'description_en' => 'required',
            'description_ar' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ];
    }
}
