<?php

namespace App\Services;

use App\Models\Estudiante;
use App\Models\SeguimientoCarrera;
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
        // Saltar encabezados
        fgetcsv($handle, 1000, ',');

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $seguimientoCarrera = SeguimientoCarrera::where('id_carrera', $data[3])
                ->where('id_jornada', $data[4])
                ->where('id_modalidad', $data[5])
                ->where('id_regional', $data[6])
                ->first();

            if ($seguimientoCarrera) {
                $estudiante = Estudiante::query()->where('nombres', '=', $data[0])
                    ->where('apellidos', '=', $data[1])->first();
                    
                if ($estudiante) {
                    $this->delete($estudiante->id);
                }

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
