<?php

namespace App\Livewire\Contenidos;

use App\Models\Contenido;
use App\Models\Clasificacion;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public $open = false;

    #[Validate('required', message: 'Por favor ingrese el título')]
    #[Validate('string', message: 'El título debe ser una cadena de texto')]
    #[Validate('max:100', message: 'El título no debe exceder los 100 caracteres')]
    public $titulo;

    #[Validate('required', message: 'Por favor ingrese un tipo válido')]
    public $tipo;

    #[Validate('nullable|string|max:100')]
    public $genero;
    
    #[Validate('nullable|integer|min:1900|max:2100')]
    public $anio_lanzamiento = 2025;
    #[Validate('nullable|integer|min:0')]
    public $duracion_minutos = 0;

    #[Validate('required|exists:clasificaciones,id')]
    public $clasificacion_id;

    

    public function save()
    {
        $this->validate();

        Contenido::create(
            [
                'titulo' => $this->titulo,
                'tipo' => $this->tipo,
                'genero' => $this->genero,
                'anio_lanzamiento' => $this->anio_lanzamiento,
                'duracion_minutos' => $this->duracion_minutos,
                'clasificacion_id' => $this->clasificacion_id,
            ]
        );


        session()->flash('success', [
            'titulo' => $this->titulo,
            'action' => 'created'
        ]);

        $this->reset('titulo', 'tipo', 'genero', 'anio_lanzamiento', 'duracion_minutos', 'clasificacion_id', 'open');
        $this->redirectRoute('contenidos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.contenidos.create', [
            'clasificaciones' => Clasificacion::all()
        ]);
    }
}
