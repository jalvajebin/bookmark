<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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

            'name' => 'required|max:50|min:3',
            'phone' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                Rule::unique('users', 'phone')->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users', 'email')->whereNull('deleted_at'),
            ],
            'password' => 'required|min:8|max:16',
            // 'role_id' => 'required',
            'user_image' => 'image|max:2048',
            'confirm_password' => 'required|same:password'

        ];
    }
    public function messages()
    {
        return [
            'role_id.required' => 'The role field is required',

        ];
    }
}
