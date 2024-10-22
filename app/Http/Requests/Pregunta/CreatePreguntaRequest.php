<?php

namespace App\Http\Requests\Pregunta;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePreguntaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'enunciado' => 'required|string',
            'id_tipo_respuesta' => 'required|integer|exists:tipo_respuestas,id'
        ];
    }

    public function messages(): array
    {
        return [
            'enunciado.required' => 'El campo :attribute es obligatorio',
            'enunciado.string' => 'El campo :attribute debe ser una cadena',
            'id_tipo_respuesta.required' => 'El campo :attribute es obligatorio',
            'id_tipo_respuesta.integer' => 'El campo :attribute debe ser un entero',
            'id_tipo_respuesta.exists' => 'El campo :attribute debe un id valido',
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