<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreAdminRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username'      => ['required', 'string', 'max:255', Rule::unique('users', 'username')],
            'email'         => ['required', 'string', 'max:255', Rule::unique('users', 'email')],
            'password'      => ['required', 'string', 'max:255'],
            
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'The username field is required.',
            'username.unique' => 'This username is already taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
