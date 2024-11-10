<?php

namespace App\Repositories\implementations;

use App\Models\CicloEstudio;
use App\Repositories\CicloRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CicloMySqlRepository implements CicloRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $idPerfil = Auth::user()->id_perfil;
        $anioActual = now()->year;

        $ciclos = CicloEstudio::query();

        if ($idPerfil === 2) {
            $ciclos->where('anio', '>=', $anioActual);
        } else if (isset($filter['anio'])) {
            $ciclos->where('anio', '=', $filter['anio']);
        }

        if ($pagination['paginate'] === 'true') {
            return $ciclos->paginate($pagination['per_page']);
        }

        return $ciclos->get();
    }

    public function show($id)
    {
        $ciclo = CicloEstudio::find($id);
        if (!$ciclo) return null;

        return $ciclo;
    }

    public function store(array $data)
    {
        return CicloEstudio::create($data);
    }

    public function update($id, array $data)
    {
        $ciclo = $this->show($id);
        if (!$ciclo) return null;

        $ciclo->update($data);
        return $ciclo;
    }

    public function delete($id)
    {
        $ciclo = $this->show($id);
        if (!$ciclo) return null;

        $ciclo->delete();
        return $ciclo;
    }
}
