<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    //
    protected $table = 'jugadores';

    protected $fillable = [
        'nombre',
        'apellido',
        'posicion',
        'numero',
        'fecha_nacimiento',
        'nacionalidad',
        'equipo_id',
    ];

    // Relación: Un jugador pertenece a un equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
