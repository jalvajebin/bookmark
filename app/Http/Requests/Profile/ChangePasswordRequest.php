<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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

            'old_password' => 'required',
            'new_password' => 'required|max:12|min:8',
            'confirm_password' => 'required|same:new_password'
        ];
    }

    public function message()
    {
        return [
            'old_password.required' => 'old password field is required',
            'new_password.required' => 'new password field is required',
            'confirm_password.required' => 'confirm_password field is required',
        ];
    }
}
