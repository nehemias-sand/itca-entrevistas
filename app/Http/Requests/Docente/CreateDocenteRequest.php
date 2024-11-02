<?php

namespace App\Http\Requests\Docente;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateDocenteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'carnet' => 'required|string',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|string',
            'id_cargo' => [
                'required',
                'integer',
                Rule::exists('cargos', 'id')->whereNull('deleted_at')
            ],
            'id_facultad' => [
                'required',
                'integer',
                Rule::exists('facultades', 'id')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'carnet.required' => 'El campo :attribute es obligatorio',
            'carnet.string' => 'El campo :attribute debe ser una cadena',
            'nombres.required' => 'El campo :attribute es obligatorio',
            'nombres.string' => 'El campo :attribute debe ser una cadena',
            'apellido.required' => 'El campo :attribute es obligatorio',
            'apellidos.string' => 'El campo :attribute debe ser una cadena',
            'email.required' => 'El campo :attribute es obligatorio',
            'email.string' => 'El campo :attribute debe ser una cadena',
            'id_cargo.required' => 'El campo :attribute es obligatorio',
            'id_cargo.integer' => 'El campo :attribute debe ser un entero',
            'id_cargo.exists' => 'El campo :attribute debe ser un id valido',
            'id_facultad.required' => 'El campo :attribute es obligatorio',
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
