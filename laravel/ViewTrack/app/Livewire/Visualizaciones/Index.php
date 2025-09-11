<?php

namespace App\Livewire\Visualizaciones;

use Livewire\Component;
use App\Models\Visualizacion;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{

    public function delete(Visualizacion $visualizacion)
    {
        $titulo = $visualizacion->contenido->titulo;
        $visualizacion->delete();

        session()->flash('success', [
            'action' => 'deleted',
            'titulo' => $titulo,
        ]);
        $this->redirectRoute('visualizaciones.index', navigate: true);
    }

    public function render()
    {
        $userId = Auth::id();

        // Si no hay usuario (por si la ruta no está protegida), redirigimos al login
        if (! $userId) {
            return redirect()->route('login');
        }

        $visualizaciones = Visualizacion::with(['usuario', 'contenido'])
            ->where('usuario_id', $userId)
            ->latest()        // opcional: ordenar por creación (o por el campo que prefieras)
            ->paginate(10);

        return view('livewire.visualizaciones.index', [
            'visualizaciones' => $visualizaciones,
        ]);
    }

}
