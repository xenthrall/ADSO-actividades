<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function producto(){
        return $this->hasMany(producto::class);
    }
}
