<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    //
    protected $table = 'competencias';

    protected $fillable = [
        'tipo_competencia_id',
        'codigo_norma',
        'nombre',
        'descripcion_norma',
        'duracion_horas',
        'version',
        'estado',
    ];

    /*
    // Aquí le decimos a Eloquent que "estado" es booleano
    protected $casts = [
        'estado' => 'boolean',
    ];
    */

    public function tipoCompetencia()
    {
        return $this->belongsTo(TipoCompetencia::class);
    }

}
