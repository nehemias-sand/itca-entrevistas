<?php

namespace App\Repositories\Implementations;

use App\Models\Carrera;
use App\Repositories\CarreraRepositoryInterface;

class CarreraMySqlRepository implements CarreraRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $carreras = Carrera::query();

        if (isset($filter['nombre'])) {
            $carreras->where('nombre', 'like', '%' . $filter['nombre'] . '%');
        }

        if ($pagination['paginate']  === 'true') {
            return $carreras->paginate($pagination['perPage']);
        }

        return $carreras->get();
    }

    public function show($id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) return null;

        return $carrera;
    }

    public function store(array $data)
    {
        $carreraToSave = $data['carrera'];
        $seguimientos = $data['seguimientos'];

        $carrera = Carrera::create($carreraToSave);
        foreach ($seguimientos as $seguimiento) {
            $carrera->seguimientos()->create($seguimiento);
        }

        return $carrera;
    }

    public function update($id, array $data)
    {
        $carrera = $this->show($id);
        if (!$carrera) return null;
        $dataToUpdate = [];

        if (isset($data['carrera'])) {
            if (isset($data['carrera']['nombre']))
                $dataToUpdate['nombre'] = $data['nombre'];

            if (isset($data['carrera']['id_facultad']))
                $dataToUpdate['id_facultad'] = $data['id_facultad'];
        }

        $carrera->update($dataToUpdate);

        if (isset($data['seguimientos'])) {
            $seguimientos = $data['seguimientos'];

            foreach ($seguimientos as $seguimiento) {
                $carrera->seguimientos()->update($seguimiento);
            }
        }

        return $carrera;
    }

    public function delete($id)
    {
        $carrera = $this->show($id);
        if (!$carrera) return null;

        $carrera->delete();
        return $carrera;
    }
}
