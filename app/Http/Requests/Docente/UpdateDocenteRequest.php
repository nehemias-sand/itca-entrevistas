<?php

namespace App\Http\Requests\Docente;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateDocenteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'carnet' => 'string',
            'nombres' => 'string',
            'apellidos' => 'string',
            'email' => 'email',
            'id_cargo' => [
                'integer',
                'nullable',
                Rule::exists('cargos', 'id')->whereNull('deleted_at')
            ],
            'id_facultad' => [
                'integer',
                'nullable',
                Rule::exists('facultades', 'id')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'carnet.string' => 'El campo :attribute debe ser una cadena',
            'nombres.string' => 'El campo :attribute debe ser una cadena',
            'apellidos.string' => 'El campo :attribute debe ser una cadena',
            'email.string' => 'El campo :attribute debe ser una cadena',
            'id_cargo.integer' => 'El campo :attribute debe ser un entero',
            'id_cargo.exists' => 'El campo :attribute debe ser un id valido',
            'id_facultad.integer' => 'El campo :attribute debe ser un entero',
            'id_facultad.exists' => 'El campo :attribute debe ser un id valido',
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
