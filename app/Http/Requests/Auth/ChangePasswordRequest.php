<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|min:8|same:new_password',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'El campo :attribute es obligatorio',
            'current_password.string' => 'El campo :attribute debe ser una cadena',
            'new_password.required' => 'El campo :attribute es obligatorio',
            'new_password.string' => 'El campo :attribute debe ser una cadena',
            'new_password.min' => 'El campo :attribute debe contener al menos 8 caracteres',
            'new_password_confirmation.required' => 'El campo :attribute es obligatorio',
            'new_password_confirmation.string' => 'El campo :attribute debe ser una cadena',
            'new_password_confirmation.min' => 'El campo :attribute debe contener al menos 8 caracteres',
            'new_password_confirmation.same' => 'La confirmación de la contraseña no coincide',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 422));
    }
}
