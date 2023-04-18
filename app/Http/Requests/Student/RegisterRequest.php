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
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|numeric|exists:departments,id',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
            // 'address' => 'string|required',
            // 'sex' => 'string|required',
            // 'phone_number' => 'string|required|unique:profiles,phone_number',
            // 'session_id' => 'required|numeric|exists:sessions,id',
            // 'faculty_id' => 'required|numeric|exists:faculties,id',
            // 'level' => 'required|numeric|min:100'
        ];
    }
}
