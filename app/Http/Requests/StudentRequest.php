<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        'first_name' => 'required|string',
        'father_name' => 'required|string',
        'grandfather_name' => 'required|string',
        'last_name' => 'required|string',
        'state' => 'required|string',
        'address' => 'required',
        'social_status' => 'required',
        'college' => 'required|string',
        'specialization' => 'required|string',
        'gender' => 'required',
        'date_of_birth' => 'required|date',
        'qualification' => 'required',
        'telephone_number' => 'nullable|numeric|digits_between:7,9',
        'mobile_number' => 'required|numeric|digits_between:10,14',
        'identification' => 'required|numeric|digits:9',
        'right_time' => 'required',
        'trining_day' => 'nullable',
        'trining_time' => 'nullable' ,
        'how_to_know_us' => 'nullable',
        'previous_courses' => 'nullable',
        'courses' => 'required|exists:courses,id',
        'status' => 'required',
        'group_id' => 'nullable|exists:groups,id',
        ];
    }
}
