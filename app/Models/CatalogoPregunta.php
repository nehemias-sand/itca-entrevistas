<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogoPregunta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'catalogo_preguntas';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function preguntas(): BelongsToMany
    {
        return $this->belongsToMany(Pregunta::class, 'seguimiento_catalogo_preguntas', 'id_catalogo', 'id_pregunta')
                    ->withTimestamps()
                    ->whereNull('seguimiento_catalogo_preguntas.deleted_at');
    }

    public function ciclos(): BelongsToMany
    {
        return $this->belongsToMany(Pregunta::class, 'seguimiento_catalogo_ciclos', 'id_catalogo', 'id_ciclo')
                    ->withTimestamps()
                    ->whereNull('seguimiento_catalogo_preguntas.deleted_at');
    }
}
