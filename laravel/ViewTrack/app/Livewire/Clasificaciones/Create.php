<?php

namespace App\Livewire\Clasificaciones;


use App\Livewire\Forms\ClasificacionForm;
use Livewire\Component;

class Create extends Component
{
    public $open = false;

    public ClasificacionForm $form;

    public function save()
    {


        $this->form->store();
        session()->flash('success', [
            'action' => 'created',
            'nombre' => $this->form->nombre,
        ]);

        $this->redirectRoute('clasificaciones.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.clasificaciones.create');
    }
}
