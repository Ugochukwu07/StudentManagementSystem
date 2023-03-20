<?php

namespace App\Http\Requests\Admin\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'session_id' => 'require|numeric|exists:sessions,id',
            'department_id' => 'require|numeric|exists:departments,id',
            'course' => 'required|string',
            'course_code' => 'required|string',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'day' => 'required|numeric',
            'venue' => 'required|string',
            'lecture' => 'required|string'
        ];
    }
}
