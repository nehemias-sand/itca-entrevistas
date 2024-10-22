<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoRespuesta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_respuestas';

    protected $fillable = [
        'nombre'
    ];

    public function preguntas(): HasMany
    {
        return $this->hasMany(Pregunta::class, 'id_tipo_respuesta', 'id');
    }
}
