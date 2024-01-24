<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'birth' => 'bail|required|date',
            'email' => 'bail|required|email',
            'phone' => 'bail|required|numeric|min:10',
            'add' => 'bail|required|max:255',
            'pass' => 'bail|required|min:8|max:16',
        ];
    }
}