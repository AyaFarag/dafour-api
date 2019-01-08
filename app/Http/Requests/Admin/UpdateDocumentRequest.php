<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use App\Models\Professional;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() instanceof Professional || $this->user() instanceof Admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'abstract' => 'required',
            'file' => 'sometimes|mimes:pdf',
            'publication_date' => 'required|date_format:Y-m-d',
            'school_id' => 'required|exists:schools,id',
            'keywords' => 'required',
            // 'authors' => 'required',
            'references' => 'required|array',
            'education_type' => 'required'
        ];
    }
}
