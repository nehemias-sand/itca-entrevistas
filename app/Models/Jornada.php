<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jornada extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jornadas';

    protected $fillable = [
        'nombre'
    ];
}
