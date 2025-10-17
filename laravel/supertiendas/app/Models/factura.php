<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{

    use HasFactory;

    protected $fillable = ['idcliente','idestado','fecha','idpago','subtotal','impuestos','total'];

    public function cliente(){
        return $this->belongsTo(cliente::class,'idcliente');
    }

    public function estado(){
        return $this->belongsTo(estado::class,'idestado');
    }

    public function paymentMethod(){
        return $this->belongsTo(paymentMethod::class,'idpago');
    }

    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }
}
