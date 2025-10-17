<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cliente extends Model
{
    protected $fillable = ['nombre', 'apellido','direccion','fechanacimiento','telefono','email','genero','created_at'];

    public function factura(){
        return $this -> HasMany(factura::class);
    }
}
