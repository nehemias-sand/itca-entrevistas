<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
        'id_facultad'
    ];

    public function facultad(): BelongsTo
    {
        return $this->belongsTo(Facultad::class, 'id_facultad', 'id');
    }

    public function seguimientos(): HasMany
    {
        return $this->hasMany(SeguimientoCarrera::class, 'id_carrera', 'id');
    }
}
