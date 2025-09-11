<?php

namespace App\Livewire\Clasificaciones;

use App\Livewire\Forms\ClasificacionForm;
use App\Models\Clasificacion;
use Livewire\Component;

class Edit extends Component
{
    public $open = false;
    public ClasificacionForm $form;
    public Clasificacion $clasificacion;

    public function mount(Clasificacion $clasificacion)
    {
        $this->clasificacion = $clasificacion;

        // Cargamos los datos existentes al form
        $this->form->fill([
            'nombre' => $clasificacion->nombre,
            'descripcion' => $clasificacion->descripcion,
        ]);
    }

    public function update()
    {
        $this->form->update($this->clasificacion);

        session()->flash('success', [
            'action' => 'updated',
            'nombre' => $this->form->nombre,
        ]);
        $this->redirectRoute('clasificaciones.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.clasificaciones.edit');
    }
}
