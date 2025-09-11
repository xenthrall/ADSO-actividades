<?php

namespace App\Livewire\Contenidos;

use App\Models\Contenido;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(Contenido $contenido)
    {
        $titulo = $contenido->titulo;
        $contenido->delete();

        session()->flash('success', [
            'action' => 'deleted',
            'titulo' => $titulo,
        ]);
        $this->redirectRoute('contenidos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.contenidos.index', [
            'contenidos' => Contenido::paginate(10),
        ]);
    }
}
