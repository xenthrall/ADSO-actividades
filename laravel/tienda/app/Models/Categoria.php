<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'nombre', 
        'descripcion'
    ];
    
    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
