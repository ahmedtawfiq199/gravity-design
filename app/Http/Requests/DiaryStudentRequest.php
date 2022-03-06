<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryStudentRequest extends FormRequest
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
            'diary_date_id' => 'nullable',
            'type' => 'required',
            'price' => 'required|numeric',
            'currency_type' => 'required',
            'bond_no' => 'required|numeric|digits:5|unique:diary_students,bond_no',
            'student_id' => 'required|exists:students,id',
        ];
    }
}
