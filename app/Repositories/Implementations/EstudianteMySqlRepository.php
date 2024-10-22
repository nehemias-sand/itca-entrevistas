<?php

namespace App\Repositories\implementations;

use App\Models\Estudiante;
use App\Repositories\EstudianteRepositoryInterface;

class EstudianteMySqlRepository implements EstudianteRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $estudiantes = Estudiante::query();

        if (isset($filter['nombresOrApellidos'])) {
            $catalogos->where('nombres', 'like', '%' . $filter['nombresOrApellidos'] . '%')
                ->orWhere('apellidos', 'like', '%' . $filter['nombresOrApellidos'] . '%');
        }

        if ($pagination['paginate'] === 'true') {
            return $estudiantes->paginate($pagination['perPage']);
        }

        return $estudiantes->get();
    }

    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) return null;

        return $estudiante;
    }

    public function store(array $data)
    {
        return Estudiante::create($data);
    }

    public function update($id, array $data)
    {
        $estudiante = $this->show($id);
        if (!$estudiante) return null;

        $estudiante->update($data);
        return $estudiante;
    }

    public function delete($id)
    {
        $estudiante = $this->show($id);
        if (!$estudiante) return null;

        $estudiante->delete();
        return $estudiante;
    }
}
