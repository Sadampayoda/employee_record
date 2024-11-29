<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'max:100',
            'email' => 'email|unique:employees,email,'.$this->route('employee')->id,
            'address' => 'max:300',
            'phone' => 'numeric',
            'user_picture' => 'nullable|file|mimes:png,jpg,jpeg|max:10000',
            'user_picture_old' => 'string'
        ];
    }
}
