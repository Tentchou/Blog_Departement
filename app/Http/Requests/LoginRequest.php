<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name'=>['required', 'string', 'min:8'],
            'email'=>['email', 'required'],
            'password' => [
                'required',
                'string',
                'min:7',  // Longueur minimale de 7 caractères
                'max:15', // Longueur maximale de 15 caractères
                'regex:/[a-z]/',      // Au moins une lettre minuscule
                'regex:/[A-Z]/',      // Au moins une lettre majuscule
                'regex:/[0-9]/',      // Au moins un chiffre
                'regex:/[@$!%*#?&]/', // Au moins un caractère spécial
            ],
            //
        ];
    }
}
