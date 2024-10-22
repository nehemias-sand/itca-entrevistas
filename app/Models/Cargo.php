<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cargos';

    protected $fillable = [
        'nombre'
    ];

    public function docentes(): HasMany 
    {
        return $this->hasMany(Docente::class, 'id_cargo', 'id');
    }
}
