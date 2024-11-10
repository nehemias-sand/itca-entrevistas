<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrevista extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entrevistas';

    protected $fillable = [
        'aprobada',
        'observaciones',
        'id_docente',
        'id_estudiante',
        'id_ciclo',
        'id_catalogo',
        'id_carrera'
    ];

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class, 'id_docente', 'id');
    }

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante', 'id');
    }

    public function ciclo(): BelongsTo
    {
        return $this->belongsTo(CicloEstudio::class, 'id_ciclo', 'id');
    }

    public function catalogo(): BelongsTo
    {
        return $this->belongsTo(CatalogoPregunta::class, 'id_catalogo', 'id');
    }

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id');
    }

    public function preguntas(): BelongsToMany
    {
        return $this->belongsToMany(Pregunta::class, 'seguimiento_entrevistas', 'id_entrevista', 'id_pregunta')
            ->using(SeguimientoEntrevista::class)
            ->withPivot('respuesta');
    }
}
