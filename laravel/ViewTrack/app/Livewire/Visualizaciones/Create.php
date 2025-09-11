<?php

namespace App\Livewire\Visualizaciones;

use Livewire\Component;
use App\Models\Contenido;
use App\Models\Visualizacion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{
    public $open = false;

    // Variable para definir la cantidad máxima de minutos vistos
    public $max_minutos_vistos = 0;

    // Campos del formulario
    public $contenido_id;
    public $fecha_visualizacion;
    public $minutos_vistos;
    public $dispositivo;
    public $completado = false;
    public $calificacion;
    public $progreso_actual = 0;

    public function mount()
    {
        $this->fecha_visualizacion = Carbon::now()->toDateString();
    }

    // Reglas dinámicas: usamos $this->max_minutos_vistos en la regla max
    public function rules()
    {
        return [
            'contenido_id'       => 'required|exists:contenidos,id',
            'fecha_visualizacion' => 'required|date',
            'minutos_vistos'     => 'nullable|integer|min:0|max:' . intval($this->max_minutos_vistos),
            'dispositivo'        => 'required|in:mobile,tablet,smart-tv,web,consola',
            'completado'         => 'boolean',
            'calificacion'       => 'nullable|integer|min:1|max:5',
        ];
    }

    // Mensajes personalizados (incluye mensaje para el max de minutos)
    public function messages()
    {
        return [
            'contenido_id.required' => 'Por favor seleccione un contenido',
            'contenido_id.exists' => 'El contenido seleccionado no es válido',
            'fecha_visualizacion.required' => 'Por favor seleccione una fecha',
            'fecha_visualizacion.date' => 'La fecha no es válida',
            'minutos_vistos.integer' => 'Por favor ingrese un número válido',
            'minutos_vistos.min' => 'Los minutos no pueden ser negativos',
            'minutos_vistos.max' => 'No puede exceder la duración del contenido',
            'dispositivo.required' => 'Por favor seleccione un dispositivo',
            'dispositivo.in' => 'Dispositivo inválido',
            'calificacion.integer' => 'Calificación inválida',
            'calificacion.min' => 'Calificación mínima 1',
            'calificacion.max' => 'Calificación máxima 5',
        ];
    }

    // Cuando se selecciona un contenido, ajustamos el máximo
    public function updatedContenidoId($value)
    {
        $contenido = Contenido::find($value);

        if ($contenido) {
            $this->minutos_vistos = null;
            $this->max_minutos_vistos = $contenido->duracion_minutos ?? 0;
        } else {
            $this->max_minutos_vistos = 0;
        }
    }

    // Mantener el progreso actualizado cuando cambian los minutos vistos
    public function updatedMinutosVistos($value)
    {
        // cast a int/float para evitar división por cero
        $max = intval($this->max_minutos_vistos);
        $min = is_null($value) ? 0 : intval($value);

        if ($max > 0) {
            if ($min > $max) {
                $this->minutos_vistos = $max;
                $min = $max;
            } elseif ($min < 0) {
                $this->minutos_vistos = 0;
                $min = 0;
            }
            $this->progreso_actual = round(($min / $max) * 100, 2);
            $this->completado = $this->progreso_actual >= 100;
        } else {
            $this->progreso_actual = 0;
        }
    }

    public function save()
    {
        //  fecha al momento del registro
        $this->fecha_visualizacion = Carbon::now()->toDateString();

        // Validación dinámica (usa rules())
        $this->validate();

        // Crear la visualización
        Visualizacion::create([
            'usuario_id' => Auth::id(),
            'contenido_id' => $this->contenido_id,
            'fecha_visualizacion' => $this->fecha_visualizacion,
            'minutos_vistos' => $this->minutos_vistos,
            'dispositivo' => $this->dispositivo,
            'completado' => $this->completado,
            'calificacion' => $this->calificacion,
            'progreso_actual' => $this->progreso_actual,
        ]);

        session()->flash('success', [
            'titulo' => $this->contenido_id ? Contenido::find($this->contenido_id)->titulo : 'Visualización',
            'action' => 'created'
        ]);

        $this->redirectRoute('visualizaciones.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.visualizaciones.create', [
            'contenidos' => Contenido::select('id', 'titulo')->get(),
            'usuario' => Auth::user() ?? null,
            'progreso' => $this->progreso_actual,
            'max_minutos_vistos' => $this->max_minutos_vistos,
        ]);
    }
}
