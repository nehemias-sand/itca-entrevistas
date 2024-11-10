<?php

namespace App\Http\Requests\Estudiante;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateEstudianteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombres' => 'string',
            'apellidos' => 'string',
            'correo' => 'email',
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.string' => 'El campo :attribute debe ser una cadena',
            'apellidos.string' => 'El campo :attribute debe ser una cadena',
            'correo.email' => 'El campo :attribute debe ser un email valido',
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
