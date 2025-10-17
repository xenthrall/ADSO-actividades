<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallefactura extends Model
{

    use HasFactory;

    protected $fillable = ['idfactura','idproducto','cantidad','preciounitario','totallinea'];

    protected $casts = [
    'cantidad' => 'integer',
    'preciounitario' => 'decimal:2',
    'totallinea' => 'decimal:2',
];


    public function producto(){
        return $this->belongsTo(producto::class,'idproducto');
    }

    public function factura(){
        return $this->belongsTo(factura::class,'idfactura');
    }
}
