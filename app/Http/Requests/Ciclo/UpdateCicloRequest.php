<?php

namespace App\Http\Requests\Ciclo;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCicloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'anio' => 'required|integer',
            'num' => 'required|integer|in:1,2',
            'codigo' => [
                'required',
                Rule::unique('ciclo_estudios', 'codigo')
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $codigo = 'C' . $this->num . '-' . $this->anio;

        $this->merge([
            'codigo' => $codigo
        ]);
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'El campo :attribute es obligatorio',
            'codigo.unique' => 'El ciclo ya fue registrado',
            'anio.required' => 'El campo :attribute es obligatorio',
            'anio.integer' => 'El campo :attribute debe ser un entero',
            'num.required' => 'El campo :attribute es obligatorio',
            'num.integer' => 'El campo :attribute debe ser un entero',
            'num.in' => 'El campo :attribute debe ser un entero entre 1 y 2',
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
