<?php

namespace App\Repositories\implementations;

use App\Models\Entrevista;
use App\Models\Estudiante;
use App\Repositories\EntrevistaRepositoryInterface;

class EntrevistaMySqlRepository implements EntrevistaRepositoryInterface
{
    public function create(array $data)
    {
        $idEstudiante = $data['id_estudiante'];
        $estudiante = Estudiante::find($idEstudiante);

        if ($estudiante) {
            $carreras = $estudiante->carreras->pluck('id')->toArray();
            $estudiante->carreras()->sync(array_fill_keys($carreras, ['evaluado' => true]));
        }

        return Entrevista::create($data);
    }

    public function findById($id)
    {
        return Entrevista::find($id);
    }
}
