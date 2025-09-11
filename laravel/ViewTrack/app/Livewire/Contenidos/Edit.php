<?php

namespace App\Livewire\Contenidos;

use App\Models\Clasificacion;
use App\Models\Contenido;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public $open = false;
    public Contenido $contenido;

    #[Validate('required', message: 'Por favor ingrese el título')]
    #[Validate('string', message: 'El título debe ser una cadena de texto')]
    #[Validate('max:100', message: 'El título no debe exceder los 100 caracteres')]
    public $titulo;

    #[Validate('required', message: 'Por favor ingrese un tipo válido')]
    public $tipo;

    #[Validate('nullable|string|max:100', message: 'El género no debe exceder los 100 caracteres')]
    public $genero;

    #[Validate('nullable|integer|min:1900|max:2100', message: 'El año debe estar entre 1900 y 2100')]
    public $anio_lanzamiento = 2025;

    #[Validate('nullable|integer|min:0', message: 'La duración debe ser un número válido')]
    public $duracion_minutos = 0;

    #[Validate('required|exists:clasificaciones,id', message: 'Debe seleccionar una clasificación válida')]
    public $clasificacion_id;

    #[Validate('nullable|date', message: 'Debe ser una fecha válida')]
    public $fecha_agregado;

    public function mount(Contenido $contenido)
    {
        $this->contenido = $contenido;

        // Cargamos los datos existentes
        $this->titulo            = $contenido->titulo;
        $this->tipo              = $contenido->tipo;
        $this->genero            = $contenido->genero;
        $this->anio_lanzamiento  = $contenido->anio_lanzamiento;
        $this->duracion_minutos  = $contenido->duracion_minutos;
        $this->clasificacion_id  = $contenido->clasificacion_id;
        $this->fecha_agregado    = $contenido->fecha_agregado;
    }

    public function update()
    {
        $this->validate();

        $this->contenido->update([
            'titulo'            => $this->titulo,
            'tipo'              => $this->tipo,
            'genero'            => $this->genero,
            'anio_lanzamiento'  => $this->anio_lanzamiento,
            'duracion_minutos'  => $this->duracion_minutos,
            'clasificacion_id'  => $this->clasificacion_id,
            'fecha_agregado'    => $this->fecha_agregado,
        ]);

        session()->flash('success', [
            'action' => 'updated',
            'titulo' => $this->titulo,
        ]);

        $this->redirectRoute('contenidos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.contenidos.edit', [
            'clasificaciones' => Clasificacion::all(),
        ]);
    }
}
