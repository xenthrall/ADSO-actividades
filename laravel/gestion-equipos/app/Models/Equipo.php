<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
        'ciudad',
        'pais',
        'fundacion',
        'liga',
    ];
}
