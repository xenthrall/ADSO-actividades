<?php

namespace App\Livewire\Clasificaciones;

use App\Models\Clasificacion;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public function delete(Clasificacion $clasificacion)
    {
        $nombre = $clasificacion->nombre;
        $clasificacion->delete();

        session()->flash('success', [
            'action' => 'deleted',
            'nombre' => $nombre,
        ]);
        $this->redirectRoute('clasificaciones.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.clasificaciones.index', [
            'clasificaciones' => Clasificacion::latest()->paginate(10)

            //'clasificaciones' => Clasificacion::latest()->paginate(10)
            //'clasificaciones' => Clasificacion::simplePaginate(10)
        ]);
    }
}
