<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCarreraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'id_facultad' => 'required|integer|exists:facultades,id',
            'seguimientos' => 'required|array|min:1',
            'seguimientos.*.id_jornada' => 'required|integer|exists:jornadas,id',
            'seguimientos.*.id_modalidad' => 'required|integer|exists:modalidades,id',
            'seguimientos.*.id_regional' => 'required|integer|exists:regionales,id',
            'seguimientos.*.id_coordinador' => 'required|integer|exists:docentes,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo :attribute es obligatorio',
            'nombre.string' => 'El campo :attribute debe ser una cadena',
            'id_facultad.required' => 'El campo :attribute es obligatorio en todos los seguimientos',
            'id_facultad.integer' => 'El campo :attribute debe ser un entero en todos los seguimientos',
            'id_facultad.exists' => 'El campo :attribute debe ser un id valido en todos los seguimientos',
            'seguimientos.required' => 'El campo :attribute es obligatorio',
            'seguimientos.array' => 'El campo :attribute debe se un array',
            'seguimientos.min' => 'El campo :attribute debe tener al menos un elemento',
            'seguimientos.*.id_jornada.required' => 'El campo :attribute es obligatorio en todos los seguimientos',
            'seguimientos.*.id_jornada.integer' => 'El campo :attribute debe ser un entero en todos los seguimientos',
            'seguimientos.*.id_jornada.exists' => 'El campo :attribute debe ser un id valido en todos los seguimientos',
            'seguimientos.*.id_modalidad.required' => 'El campo :attribute es obligatorio en todos los seguimientos',
            'seguimientos.*.id_modalidad.integer' => 'El campo :attribute debe ser un entero en todos los seguimientos',
            'seguimientos.*.id_modalidad.exists' => 'El campo :attribute debe ser un id valido en todos los seguimientos',
            'seguimientos.*.id_regional.required' => 'El campo :attribute es obligatorio en todos los seguimientos',
            'seguimientos.*.id_regional.integer' => 'El campo :attribute debe ser un entero en todos los seguimientos',
            'seguimientos.*.id_regional.exists' => 'El campo :attribute debe ser un id valido en todos los seguimientos',
            'seguimientos.*.id_coordinador.required' => 'El campo :attribute es obligatorio en todos los seguimientos',
            'seguimientos.*.id_coordinador.integer' => 'El campo :attribute debe ser un entero en todos los seguimientos',
            'seguimientos.*.id_coordinador.exists' => 'El campo :attribute debe ser un id valido en todos los seguimientos',
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
