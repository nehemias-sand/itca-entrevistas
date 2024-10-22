<?php

namespace App\Http\Requests\CatalogoPreguntas;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCatalogoPreguntasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'string',
            'descripcion' => 'string',
            'ids_pregunta' => 'array|min:1',
            'ids_pregunta.*' => [
                'integer',
                'distinct',
                'min:1',
                Rule::exists('preguntas', 'id')->whereNull('deleted_at')
            ],
            'id_ciclo' => [
                'integer',
                Rule::exists('ciclo_estudios', 'id')->whereNull('deleted_at')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.string' => 'El campo :attribute debe ser una cadena',
            'descripcion.string' => 'El campo :attribute debe ser una cadena',
            'ids_pregunta.array' => 'El campo :attribute debe ser un array',
            'ids_pregunta.min' => 'El campo :attribute debe tener al menos un elemento',
            'ids_pregunta.*.integer' => 'El campo :attribute debe ser un entero',
            'ids_pregunta.*.distinct' => 'El campo :attribute debe ser único, no puede haber duplicados',
            'ids_pregunta.*.min' => 'El campo de :attribute debe ser al menos 1',
            'ids_pregunta.*.exists' => 'El campo :attribute debe ser un id valido',
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
