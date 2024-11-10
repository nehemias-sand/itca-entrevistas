<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
    ];

    public function entrevistas(): HasMany
    {
        return $this->hasMany(Entrevista::class, 'id_estudiante', 'id');
    }

    public function carreras(): BelongsToMany
    {
        return $this->belongsToMany(SeguimientoCarrera::class, 'seguimiento_carrera_estudiantes', 'id_estudiante', 'id_seguimiento_carrera')
            ->withPivot('evaluado')
            ->withTimestamps()
            ->where('evaluado', false);
    }
}
