<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCountryRequest extends FormRequest
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
            'image' => 'max:2048',
            'country_code' => 'required|max:50',
            'country_name' => 'required|max:100',
            // 'country_description' => 'required|min:4',
            // 'visa_requirements_description' => 'required|min:4',
            'currency' => 'required|max:50',
 
        ];
    }
}
