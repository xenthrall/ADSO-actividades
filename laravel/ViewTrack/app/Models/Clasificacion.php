<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    //
    protected $table = 'clasificacions';
    protected $fillable = [
        'clasificacion', 
        'descripcion'];
}
