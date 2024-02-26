<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectScreeningRequest extends FormRequest
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
            'first_name' => 'required|string|regex:/^[\p{L}\s-]+$/',
            'date_of_birth' => 'required|date|before:today',
            'migraine_frequency' => 'required|string|in:Monthly,Weekly,Daily',
            'daily_migraine_frequency' => [
                'nullable',
                Rule::requiredIf(function () {
                    return $this->input('migraine_frequency') === 'Daily';
                }),
                'string',
                'in:1-2,3-4,5+',
            ],
        ];
    }

    public function messages()
    {
        return[
            'first_name.regex' => 'A first name field must be alphabetical.'
        ];
    }
}
