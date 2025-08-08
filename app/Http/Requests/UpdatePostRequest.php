<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdatePostRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'exists:users,id'],
            'is_block' => ['nullable', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'contact_phone.required' => 'The contact phone field is required.',
            'user_id.required' => 'The user field is required.',
        ];
    }
}