<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'image' => 'required|image|max:2048',
            'course_name' => 'required',
            'country' => 'required',
            'stream' => 'required',
            // 'start_date' => 'required',
            'duration' => 'required',
            'eligibility' => 'required',
            'description' => 'required',
            'university' => 'required',
            'type' => 'required',
            'time' => 'required',
            'intake' => 'required',
            'fees' => 'required|numeric',
            'requierd_docs' => 'required',
            'currency' => 'required'
        ];
    }
}
