<?php

namespace App\Livewire\Forms;

use App\Models\Clasificacion;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClasificacionForm extends Form
{
    //
    #[Validate('required', message: 'Por favor ingrese nombre de la clasificación')]
    #[Validate('unique:clasificaciones', message: 'El nombre de la clasificación ya existe')]
    #[Validate('max:25', message: 'El nombre no debe exceder los 25 caracteres')]
    public $nombre;

    #[Validate('max:50', message: 'La descripción no debe exceder los 50 caracteres')]
    public $descripcion;

    public function store()
    {
        $this->validate();

        Clasificacion::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);
    }

    public function update(Clasificacion $clasificacion)
    {
        $this->validate();

        $clasificacion->update($this->all());
    }
    
}
