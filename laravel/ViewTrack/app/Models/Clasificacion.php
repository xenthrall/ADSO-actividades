<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    //
    protected $table = 'clasificaciones';
    protected $fillable = [
        'nombre', 
        'descripcion'];

    /**
     * Relación con Contenido (uno a muchos).
     */
    public function contenidos()
    {
        return $this->hasMany(Contenido::class, 'clasificacion_id');
    }
}
