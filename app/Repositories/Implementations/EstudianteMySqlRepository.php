<?php

namespace App\Repositories\implementations;

use App\Models\Estudiante;
use App\Models\SeguimientoCarrera;
use App\Repositories\EstudianteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EstudianteMySqlRepository implements EstudianteRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $idPerfil = Auth::user()->id_perfil;
        $estudiantes = Estudiante::query();

        if ($idPerfil === 2) {
            $estudiantes->whereHas('carreras', function ($query) {
                $query->where('evaluado', false);
            });
        }

        if (isset($filter['nombresOrApellidos'])) {
            $estudiantes->where('nombres', 'like', '%' . $filter['nombresOrApellidos'] . '%')
                ->orWhere('apellidos', 'like', '%' . $filter['nombresOrApellidos'] . '%');
        }

        if ($pagination['paginate'] === 'true') {
            return $estudiantes->paginate($pagination['per_page']);
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
        $nombres = $data['nombres'];
        $apellidos = $data['apellidos'];
        $correo = $data['correo'];
        $idCarrera = $data['id_carrera'];
        $idJornada = $data['id_jornada'];
        $idModalidad = $data['id_modalidad'];
        $idRegional = $data['id_regional'];

        $seguimientoCarrera = SeguimientoCarrera::where('id_carrera', $idCarrera)
            ->where('id_jornada', $idJornada)
            ->where('id_modalidad', $idModalidad)
            ->where('id_regional', $idRegional)
            ->first();

        if(!$seguimientoCarrera) {
            throw new \Exception('No se encontró el seguimiento de carrera con los datos proporcionados.');
        }

        $estudiante = Estudiante::create(compact('nombres', 'apellidos', 'correo'));
        $estudiante->carreras()->sync([$seguimientoCarrera->id]);

        return $estudiante;
    }

    public function update($id, array $data)
    {
        $estudiante = $this->show($id);
        if (!$estudiante) return null;
        $dataToUpdate = [];

        if(isset($data['nombres'])) $dataToUpdate['nombres'] = $data['nombres'];
        if(isset($data['apellidos'])) $dataToUpdate['apellidos'] = $data['apellidos'];
        if(isset($data['correo'])) $dataToUpdate['correo'] = $data['correo'];

        $estudiante->update($dataToUpdate);

        if(isset($data['id_seguimiento_carrera'])) {

        }

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
