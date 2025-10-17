<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class producto extends Model
{
    protected $fillable = ['nombre','descripcion','precio','preciocompra','stock','idcategoria','idmarca','created_at','estado',];

    public function marca(){
        return $this->belongsTo(marca::class,'idmarca');
    }

    public function categoria(){
        return $this->belongsTo(categoria::class,'idcategoria');
    }

    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }
}
