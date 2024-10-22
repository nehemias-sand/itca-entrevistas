<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facultad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'facultades';

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function carreras(): HasMany
    {
        return $this->hasMany(Carrera::class, 'id_facultad', 'id');
    }

    public function docentes(): HasMany
    {
        return $this->hasMany(Docente::class, 'id_facultad', 'id');
    }
}
