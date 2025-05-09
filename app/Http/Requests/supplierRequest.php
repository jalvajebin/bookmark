<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierRequest extends FormRequest
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
            "supplier_name" => "required|max:100",
            "email" => "required|email:rfc,dns",
            "phone_number" => "required|max:16|regex:/^([0-9\s\-\+\(\)]*)$/",
            "country" => "required|max:100",
            "address" => "required|max:100",
          
        ];
    }
    public function messages()
    {
        return [
           

        ];
    }
}
