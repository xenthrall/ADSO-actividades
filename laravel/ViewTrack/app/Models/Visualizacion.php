<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visualizacion extends Model
{

    protected $table = 'visualizaciones';

    protected $fillable = [
        'usuario_id',
        'contenido_id',
        'fecha_visualizacion',
        'minutos_vistos',
        'dispositivo',
        'completado',
        'calificacion',
        'progreso_actual',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function contenido()
    {
        return $this->belongsTo(Contenido::class, 'contenido_id');
    }
}