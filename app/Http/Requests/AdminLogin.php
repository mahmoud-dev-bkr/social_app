<?php

namespace App\Http\Requests;


class AdminLogin extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
}
