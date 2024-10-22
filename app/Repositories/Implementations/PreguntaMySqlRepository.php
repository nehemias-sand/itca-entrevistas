<?php

namespace App\Repositories\implementations;

use App\Models\Pregunta;
use App\Repositories\PreguntaRepositoryInterface;

class PreguntaMySqlRepository implements PreguntaRepositoryInterface
{
    public function index(array $pagination, array $filter) {
        $preguntas = Pregunta::query();

        if ($pagination['paginate'] === 'true') {
            return $preguntas->paginate($pagination['perPage']);
        }

        return $preguntas->get();
    }

    public function show($id) {
        $pregunta = Pregunta::find($id);
        if (!$pregunta) return null;

        return $pregunta;
    }

    public function store(array $data) {
        return Pregunta::create($data);
    }

    public function update($id, array $data) {
        $pregunta = $this->show($id);
        if (!$pregunta) return null;

        $pregunta->update($data);
        return $pregunta;
    }

    public function delete($id) {
        $pregunta = $this->show($id);
        if (!$pregunta) return null;

        $pregunta->delete();
        return $pregunta;
    }
}
