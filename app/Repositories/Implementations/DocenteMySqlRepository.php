<?php

namespace App\Repositories\Implementations;

use App\Models\Docente;
use App\Repositories\DocenteRepositoryInterface;

class DocenteMySqlRepository implements DocenteRepositoryInterface{

    public function index(array $pagination, array $filter)
    {
        $docentes = Docente::query();

        if (isset($filter['nombresOrApellidos'])) {
            $docentes->where('nombres', 'like', '%' . $filter['nombresOrApellidos'] . '%')
            ->orWhere('apellidos', 'like', '%' . $filter['nombresOrApellidos'] . '%');
        }

        if($pagination['paginate'] === 'true') {
            return $docentes->paginate($pagination['per_page']);
        }

        return $docentes->get();
    }

    public function show($id)
    {
        $docente = Docente::find($id);
        if(!$docente) return null;

        return $docente;
    }

    public function store(array $data) 
    {
        return Docente::create($data);
    }

    public function update($id, array $data)
    {
        $docente = $this->show($id);
        if(!$docente) return null;

        $docente->update($data);
        return $docente;
    }

    public function delete($id)
    {
        $docente = $this->show($id);
        if(!$docente) return null;

        $docente->delete();
        return $docente;
    }
}