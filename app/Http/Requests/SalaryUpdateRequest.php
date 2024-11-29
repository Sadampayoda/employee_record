<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryUpdateRequest extends FormRequest
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
            'month'          => 'required|integer|between:1,12',
            'year'           => 'required|integer|min:2000|max:2100',
            'basic_salary'   => 'required|numeric|min:0',
            'loan'           => 'required|numeric|min:0',
        ];
    }
}
