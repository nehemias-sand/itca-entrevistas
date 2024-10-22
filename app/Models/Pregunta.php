<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregunta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'preguntas';

    protected $fillable = [
        'enunciado',
        'id_tipo_respuesta'
    ];

    public function tipoRespuesta(): BelongsTo
    {
        return $this->belongsTo(TipoRespuesta::class, 'id_tipo_respuesta', 'id');
    }

    public function catalogos(): BelongsToMany
    {
        return $this->belongsToMany(CatalogoPregunta::class, 'seguimiento_catalogo_preguntas', 'id_pregunta', 'id_catalogo')
            ->withTimestamps();
    }

    public function entrevistas(): BelongsToMany
    {
        return $this->belongsToMany(Entrevista::class, 'seguimiento_entrevistas', 'id_pregunta', 'id_entrevista')
            ->using(SeguimientoEntrevista::class);
    }
}
