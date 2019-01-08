<?php

namespace App\Http\Requests\Professional;

use App\Models\Admin;
use App\Models\Professional;
use Illuminate\Foundation\Http\FormRequest;

class UploadDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'file' => 'required|mimes:pdf',
            'publication_date' => 'required|date_format:Y-m-d',
            'school_id' => 'required|exists:schools,id',
            'keywords' => 'required',
            'authors' => 'required',
            'references' => 'required|array',
            'education_type' => 'required'
        ];
    }
}
