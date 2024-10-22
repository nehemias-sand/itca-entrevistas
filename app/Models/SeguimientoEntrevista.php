<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeguimientoEntrevista extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'seguimiento_entrevistas';

    public $incrementing = false;

    protected $fillable = [
        'id_entrevista',
        'id_pregunta',
        'respuesta'
    ];

    public function entrevista(): BelongsTo
    {
        return $this->belongsTo(Entrevista::class, 'id_entrevista', 'id');
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta', 'id');
    }
}
