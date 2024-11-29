<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|unique:employees,email',
            'address' => 'required',
            'phone' => 'required|numeric',
            'user_picture' => 'required|file|mimes:png,jpg,jpeg|max:10000',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'

        ];
    }
}
