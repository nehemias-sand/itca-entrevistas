<?php

namespace App\Http\Requests\Estudiante;

use App\Models\SeguimientoCarrera;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateEstudianteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'id_carrera' => [
                'required',
                'integer',
                Rule::exists('carreras', 'id')->whereNull('deleted_at')
            ],
            'id_jornada' => [
                'required',
                'integer',
                Rule::exists('jornadas', 'id')->whereNull('deleted_at')
            ],
            'id_modalidad' => [
                'required',
                'integer',
                Rule::exists('modalidades', 'id')->whereNull('deleted_at')
            ],
            'id_regional' => [
                'required',
                'integer',
                Rule::exists('regionales', 'id')->whereNull('deleted_at')
            ],
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $seguimientoCarrera = SeguimientoCarrera::where('id_carrera', $this->id_carrera)
                ->where('id_jornada', $this->id_jornada)
                ->where('id_modalidad', $this->id_modalidad)
                ->where('id_regional', $this->id_regional)
                ->first();

            if (!$seguimientoCarrera) {
                $validator->errors()->add('id_carrera', 'La combinación de carrera, jornada, modalidad y regional es inválida.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'nombres.required' => 'El campo :attribute es obligatorio',
            'nombres.string' => 'El campo :attribute debe ser una cadena',
            'apellido.required' => 'El campo :attribute es obligatorio',
            'apellidos.string' => 'El campo :attribute debe ser una cadena',
            'correo.required' => 'El campo :attribute es obligatorio',
            'correo.email' => 'El campo :attribute debe ser un email valido',
            'id_carrera.required' => 'El campo :attribute es obligatorio',
            'id_carrera.integer' => 'El campo :attribute debe ser un entero',
            'id_carrera.exists' => 'El campo :attribute debe ser un id valido',
            'id_jornada.required' => 'El campo :attribute es obligatorio',
            'id_jornada.integer' => 'El campo :attribute debe ser un entero',
            'id_jornada.exists' => 'El campo :attribute debe ser un id valido',
            'id_modalidad.required' => 'El campo :attribute es obligatorio',
            'id_modalidad.integer' => 'El campo :attribute debe ser un entero',
            'id_modalidad.exists' => 'El campo :attribute debe ser un id valido',
            'id_regional.required' => 'El campo :attribute es obligatorio',
            'id_regional.integer' => 'El campo :attribute debe ser un entero',
            'id_regional.exists' => 'El campo :attribute debe ser un id valido',
            
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
