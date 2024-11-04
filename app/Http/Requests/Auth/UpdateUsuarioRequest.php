<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $idUsuario = $this->route('id');

        return [
            'username' => 'string',
            'email' => 'email|unique:users,email,' . $idUsuario
        ];
    }

    public function messages(): array
    {
        return [
            'username.string' => 'El campo :attribute debe ser una cadena',
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
