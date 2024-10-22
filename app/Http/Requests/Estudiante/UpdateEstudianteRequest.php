<?php

namespace App\Http\Requests\Estudiante;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
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
            'id_carrera' => [
                'integer',
                'nullable',
                'required_with:id_jornada,id_modalidad',
                Rule::exists('carreras', 'id')->whereNull('deleted_at')
            ],
            'id_jornada' => [
                'integer',
                'nullable',
                'required_with:id_carrera,id_modalidad',
                Rule::exists('jornadas', 'id')->whereNull('deleted_at')
            ],
            'id_modalidad' => [
                'integer',
                'nullable',
                'required_with:id_carrera,id_jornada',
                Rule::exists('modalidades', 'id')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.string' => 'El campo :attribute debe ser una cadena',
            'apellidos.string' => 'El campo :attribute debe ser una cadena',
            'correo.email' => 'El campo :attribute debe ser un email valido',
            'id_carrera.integer' => 'El campo :attribute debe ser un entero',
            'id_carrera.required_with' => 'El campo id_carrera es obligatorio si se proporciona id_jornada o id_modalidad.',
            'id_carrera.exists' => 'El campo :attribute debe ser un id valido',
            'id_jornada.integer' => 'El campo :attribute debe ser un entero',
            'id_jornada.required_with' => 'El campo id_jornada es obligatorio si se proporciona id_carrera o id_modalidad.',
            'id_jornada.exists' => 'El campo :attribute debe ser un id valido',
            'id_modalidad.integer' => 'El campo :attribute debe ser un entero',
            'id_modalidad.required_with' => 'El campo id_modalidad es obligatorio si se proporciona id_carrera o id_jornada.',
            'id_modalidad.exists' => 'El campo :attribute debe ser un id valido',
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
