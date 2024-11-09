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
            'id_catalogo' => [
                'required',
                'integer',
                Rule::exists('catalogo_preguntas', 'id')->whereNull('deleted_at')
            ],
            'id_carrera' => [
                'required',
                'integer',
                Rule::exists('carreras', 'id')->whereNull('deleted_at')
            ],
            'seguimientos' => 'required|array',
            'seguimientos.*.id_pregunta' => 'required|exists:preguntas,id',
            'seguimientos.*.respuesta' => 'required|string'
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $idCiclo = $this->input('id_ciclo');
            $idCatalogo = $this->input('id_catalogo');
            $seguimientos = $this->input('seguimientos', []);

            // Validar que el catálogo pertenece al ciclo
            $ciclo = CicloEstudio::with('catalogos')->find($idCiclo);
            if (!$ciclo || !$ciclo->catalogos->contains('id', $idCatalogo)) {
                $validator->errors()->add('id_catalogo', 'El catálogo no pertenece al ciclo proporcionado.');
            }

            // Validar que cada pregunta pertenece al catálogo
            $catalogo = CatalogoPregunta::with('preguntas')->find($idCatalogo);
            if ($catalogo) {
                $preguntasValidas = $catalogo->preguntas->pluck('id')->toArray();
                foreach ($seguimientos as $index => $seguimiento) {
                    if (!in_array($seguimiento['id_pregunta'], $preguntasValidas)) {
                        $validator->errors()->add(
                            "seguimientos.$index.id_pregunta",
                            "La pregunta con ID {$seguimiento['id_pregunta']} no pertenece al catálogo proporcionado."
                        );
                    }
                }
            }
        });
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
