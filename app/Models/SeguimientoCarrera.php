<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeguimientoCarrera extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seguimiento_carreras';

    protected $fillable = [
        'id_carrera',
        'id_jornada',
        'id_modalidad',
        'id_regional',
        'id_coordinador'
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function jornada(): BelongsTo
    {
        return $this->belongsTo(Jornada::class, 'id_jornada');
    }

    public function modalidad(): BelongsTo
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }

    public function regional(): BelongsTo
    {
        return $this->belongsTo(Regional::class, 'id_regional');
    }

    public function coordinador(): BelongsTo
    {
        return $this->belongsTo(Docente::class, 'id_coordinador');
    }
}
