<?php

namespace App\Http\Requests\Entrevista;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateEntrevistaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'aprobada' => 'required|boolean',
            'observaciones' => 'required|string',
            'id_estudiante' => [
                'required',
                'integer',
                Rule::exists('estudiantes', 'id')->whereNull('deleted_at')
            ],
            'id_ciclo' => [
                'required',
                'integer',
                Rule::exists('ciclo_estudios', 'id')->whereNull('deleted_at')
            ],
            'seguimientos' => 'required|array',
            'seguimientos.*.id_pregunta' => 'required|exists:preguntas,id',
            'seguimientos.*.respuesta' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'aprobada.required' => 'El campo :attribute es obligatorio',
            'aprobada.string' => 'El campo :attribute debe ser booleano',
            'observaciones.required' => 'El campo :attribute es obligatorio',
            'observaciones.string' => 'El campo :attribute debe ser una cadena',
            'id_estudiante.required' => 'El campo :attribute es obligatorio',
            'id_estudiante.integer' => 'El campo :attribute debe ser un entero',
            'id_estudiante.exists' => 'El campo :attribute debe ser un id valido',
            'id_ciclo.required' => 'El campo :attribute es obligatorio',
            'id_ciclo.integer' => 'El campo :attribute debe ser un entero',
            'id_ciclo.exists' => 'El campo :attribute debe ser un id valido',
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
