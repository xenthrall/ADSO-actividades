<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultasMedica extends Model
{
    // Nombre de la tabla (opcional si sigue convención)
    protected $table = 'consultas_medicas';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'tipo_consulta',
        'id_paciente',
        'fecha_consulta',
        'motivo',
        'diagnostico',
        'estado_pago',
    ];

    /**
     * Relación: Una consulta pertenece a un paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
