<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateAdminRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username'      => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255'],
            'password'      => ['nullable', 'string', 'max:255'], // Changed 'null' to 'nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'The username field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.min' => 'The password must be at least 8 characters.', // Adjusted for consistency
        ];
    }
}