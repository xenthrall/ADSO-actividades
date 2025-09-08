<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',        
        'precio',
        'stock',
        'fecha_creacion',
        'estado',
        'idCategoria',
        'idMarca'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idMarca');
    }

}
