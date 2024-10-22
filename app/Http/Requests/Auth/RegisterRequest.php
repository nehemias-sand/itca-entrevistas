<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'El campo :attribute es obligatorio',
            'username.string' => 'El campo :attribute debe ser una cadena',
            'email.required' => 'El campo :attribute es obligatorio',
            'email.email' => 'El campo :attribute debe ser un correo',
            'email.unique' => 'El campo :attribute debe ser unico',
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
