<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos';

    protected $fillable = [
        'titulo',
        'tipo',
        'genero',
        'anio_lanzamiento',
        'duracion_minutos',
        'clasificacion_id',
    ];

    /**
     * Relación con Clasificación (muchos a uno).
     */
    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion_id');
    }

    /**
     * Relación con Visualizacion (uno a muchos).
     */
    public function visualizaciones()
    {
        return $this->hasMany(Visualizacion::class, 'contenido_id');
    }
}
