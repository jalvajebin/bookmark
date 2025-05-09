<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class CountryRequest extends FormRequest
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
            'image' => request()->id ? '' : 'required|image|max:2048',
            'country_code' => 'required|max:50',
            'country_name' => [
                'required',
                'max:100',
                ValidationRule::unique('countries', 'country_name')->ignore(request()->id)->where('deleted_at',null),
            ],
            'currency' => 'required|max:50',
        ];
    }
}
