<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'string|required',
            'reg_number' => 'string|required|unique:profiles,reg_number',
            'email' => 'required|email',
            'address' => 'string|required',
            'sex' => 'string|required',
            'phone_number' => 'string|required|unique:profiles,phone_number',
            'session_id' => 'require|numeric|exists:sessions,id',
            'faculty_id' => 'require|numeric|exists:faculties,id',
            'department_id' => 'require|numeric|exists:departments,id',
            'password' => 'require|string|confirmed',
            'password_confirmation' => 'require|string',
            'level' => 'required|numeric|min:100'
        ];
    }
}
