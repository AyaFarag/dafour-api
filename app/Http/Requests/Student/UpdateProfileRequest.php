<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() instanceof Student;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:191',
            'middle_name' => 'sometimes|max:191',
            'last_name' => 'required|max:191',
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('students')->ignore($this->user()->id)->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ],
            'password' => 'sometimes|nullable|min:6|max:191|confirmed',
            'phone' => 'sometimes|max:191',
            'country' => 'required|max:2|min:2',
        ];
    }
}
