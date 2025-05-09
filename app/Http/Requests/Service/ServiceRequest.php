<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_name' => 'required|min:4',
            // 'country_id' => 'required',
            'service_description' => 'required',
            'service_address' => 'required',
            'service_email' => 'required|email:rfc,dns',
            'service_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'service_policy' => 'required',
            'gender_preferences' => 'required',
            'service_type' => 'required',
            'service_image' => 'required|image|max:2048',

        ];
    }
    public function messages()
    {
        return [
            'service_name.required' => 'The service field is required.',
            'country_id.required' => "The country field is required.",
            'service_description.required' => "The description field is required.",
            'service_address.required' => 'The address field is required',
            'service_phone.required' => 'The phone field is required',
            'service_email.required' => 'The email field is required',
            'service_policy.required' => 'The policy field is required',
            'gender_preferences.required' => 'The gender field is required',
            'service_type.required' => 'The type field is required',
            'service_image.required' => "The image field is required",
            'service_image.max' => "Maximum file size to upload is 2MB (2048 KB)"

        ];
    }
}
