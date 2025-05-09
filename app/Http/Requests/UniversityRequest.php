<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversityRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            // "stream" => "required",
            "location" => "required",
            "est_year" => "required",
            "email" => "required|email:rfc,dns",
            "phone" => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "website" => "required|url",
            'image' => (!isset(request()->university_id)) ? 'required|image|max:2048' : "",
            'country_id' => 'required',
            'logo' => (!isset(request()->university_id)) ? 'required|image|max:2048' : "",
            'description' => 'required',
            // 'brochure' => (!isset(request()->university_id)) ? 'required|max:10240' : "",
        ];
    }
    public function messages()
    {
        return [
            'country_id.required' => 'The country field is required.',
            'est_year.required' => 'The established year field is required.',
            'image.required' => 'University Bannner field is required',
            'image.image' => 'University Banner must be an image.'

        ];
    }
}
