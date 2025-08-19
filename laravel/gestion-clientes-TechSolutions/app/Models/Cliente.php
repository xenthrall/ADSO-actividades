<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'fecha_nacimiento',
        'telefono',
        'email',
        'fecha_registro',
        'genero'
    ];

    public $timestamps = false;
}
