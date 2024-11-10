<?php

namespace App\Repositories\Implementations;

use App\Models\Entrevista;
use App\Models\Estudiante;
use App\Repositories\EntrevistaRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EntrevistaMySqlRepository implements EntrevistaRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $idPerfil = Auth::user()->id_perfil;

        $entrevistas = Entrevista::query();

        if (isset($filter['id_ciclo'])) {
            $entrevistas->where('id_ciclo', '=', $filter['id_ciclo']);
        }

        if ($idPerfil === 2) {
            $docente = Auth::user()->docente;
            $entrevistas->where('id_docente', '=', $docente->id);
        }

        if ($pagination['paginate'] === 'true') {
            return $entrevistas->paginate($pagination['per_page']);
        }

        return $entrevistas->get();
    }

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
