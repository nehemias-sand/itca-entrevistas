<?php

namespace App\Services;

use App\Repositories\EstudianteRepositoryInterface;

class EstudianteService
{
    public function __construct(
        private EstudianteRepositoryInterface $estudianteRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->estudianteRepositoryInterface->index($pagination, $filter);
    }

    public function show($id)
    {
        return $this->estudianteRepositoryInterface->show($id);
    }

    public function store(array $data)
    {
        return $this->estudianteRepositoryInterface->store($data);
    }

    public function importarCSV($handle)
    {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $this->store([
                'nombres' => $data[0],
                'apellidos'  => $data[1],
                'correo'   => $data[2],
                'id_carrera'   => $data[3],
                'id_jornada'   => $data[4],
                'id_modalidad'   => $data[5],
                'id_regional'   => $data[6],
            ]);
        }

        fclose($handle);
    }

    public function update($id, array $data)
    {
        return $this->estudianteRepositoryInterface->update($id, $data);
    }

    public function delete($id)
    {
        return $this->estudianteRepositoryInterface->delete($id);
    }
}
