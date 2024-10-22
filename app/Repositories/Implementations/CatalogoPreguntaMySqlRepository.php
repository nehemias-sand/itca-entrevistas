<?php

namespace App\Repositories\implementations;

use App\Models\CatalogoPregunta;
use App\Repositories\CatalogoPreguntaRepositoryInterface;

class CatalogoPreguntaMySqlRepository implements CatalogoPreguntaRepositoryInterface
{
    public function index(array $pagination, array $filter) {
        $catalogos = CatalogoPregunta::query();
        
        if (isset($filter['nombre'])) {
            $catalogos->where('nombre', 'like', '%' . $filter['nombre'] . '%');
        }

        if ($pagination['paginate']  === 'true') {
            return $catalogos->paginate($pagination['perPage']);
        }

        return $catalogos->get();
    }

    public function show($id) {
        $catalogo = CatalogoPregunta::find($id);
        if (!$catalogo) return null;

        return $catalogo;
    }

    public function store(array $data) {
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $idsPregunta = $data['ids_pregunta'];
        $idCiclo = $data['id_ciclo'];

        $catalogo = CatalogoPregunta::create(compact('nombre', 'descripcion'));
        $catalogo->preguntas()->sync($idsPregunta);
        $catalogo->ciclos()->sync([$idCiclo]);

        return $catalogo;
    }

    public function update($id, array $data) {
        $catalogo = $this->show($id);
        if (!$catalogo) return null;
        $dataToUpdate = [];

        if (isset($data['nombre'])) $dataToUpdate['nombre'] = $data['nombre'];
        if (isset($data['descripcion'])) $dataToUpdate['descripcion'] = $data['descripcion'];

        $catalogo->update($dataToUpdate);

        if (isset($data['ids_pregunta'])) {
            $idsPregunta = $data['ids_pregunta'];
            $catalogo->preguntas()->sync($idsPregunta);
        }

        if (isset($data['id_ciclo'])) {
            $idCiclo = $data['id_ciclo'];
            $catalogo->ciclos()->sync([$idCiclo]);
        }

        return $catalogo;
    }

    public function delete($id) {
        $catalogo = $this->show($id);
        if (!$catalogo) return null;

        $catalogo->delete();
        return $catalogo;
    }
}
