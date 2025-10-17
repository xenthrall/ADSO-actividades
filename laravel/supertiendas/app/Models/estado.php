<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    protected $fillable = ['descripcion'];

    public function factura(){
        return $this->hasMany(factura::class);
    }
}
