<?php

namespace App\Livewire\Forms;

use App\Models\Visualizacion;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VisualizacionForm extends Form
{
    //
    //#[Validate('unique:clasificaciones', message: 'El nombre de la clasificación ya existe')]
    #[Validate('required', message: 'Por favor ingrese nombre de la clasificación')]
    #[Validate('max:25', message: 'El nombre no debe exceder los 25 caracteres')]
    public $nombre;

    #[Validate('max:50', message: 'La descripción no debe exceder los 50 caracteres')]
    public $descripcion;

    public function store()
    {
        $this->validate();

        Visualizacion::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);
    }

    public function update(Visualizacion $visualizacion)
    {
        $this->validate();

        $visualizacion->update($this->all());
    }
    
}
