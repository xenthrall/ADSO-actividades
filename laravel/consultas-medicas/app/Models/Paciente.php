<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'pacientes';

    protected $fillable = [
        'tipoDocumento',
        'dni',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'genero',
        'telefono',
        'email',
        'direccion',
        'estado',
    ];
}
