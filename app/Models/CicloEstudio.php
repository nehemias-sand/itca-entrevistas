<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CicloEstudio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ciclo_estudios';

    protected $fillable = [
        'codigo',
        'anio',
        'num'
    ];

    public function entrevistas(): HasMany
    {
        return $this->hasMany(Entrevista::class, 'id_ciclo', 'id');
    }

    public function catalogos(): BelongsToMany
    {
        return $this->belongsToMany(CatalogoPregunta::class, 'seguimiento_catalogo_ciclos', 'id_ciclo', 'id_catalogo')
                    ->withTimestamps();
    }
}
