<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'docentes';

    protected $fillable = [
        'carnet',
        'nombres',
        'apellidos',
        'id_usuario',
        'id_cargo',
        'id_facultad',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }

    public function facultad(): BelongsTo
    {
        return $this->belongsTo(Facultad::class, 'id_facultad', 'id');
    }

    public function entrevistas(): HasMany
    {
        return $this->hasMany(Entrevista::class, 'id_docente', 'id');
    }
}
