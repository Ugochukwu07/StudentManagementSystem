<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'reg_number' => 'string|required|unique:profiles,reg_number',
            'address' => 'string|required',
            'sex' => 'string|required',
            'phone_number' => 'string|required|unique:profiles,phone_number',
            'session_id' => 'require|numeric|exists:sessions,id',
            'faculty_id' => 'require|numeric|exists:faculties,id',
            'department_id' => 'require|numeric|exists:departments,id',
            'level' => 'required|numeric|min:100'
        ];
    }
}
