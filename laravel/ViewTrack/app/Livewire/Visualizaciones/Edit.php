<?php

namespace App\Livewire\Visualizaciones;

use Livewire\Component;
use App\Models\Contenido;
use App\Models\Visualizacion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Edit extends Component
{
    public $open = false;

    // id de la visualización que editamos
    public $visualizacion_id;

    // Campos (misma estructura que en Create)
    public $contenido_id;
    public $fecha_visualizacion;
    public $minutos_vistos;
    public $dispositivo;
    public $completado = false;
    public $calificacion;
    public $progreso_actual = 0;

    // para controlar el máximo según el contenido seleccionado
    public $max_minutos_vistos = 0;

    /**
     * Cargamos la visualización por id cuando se monta el componente.
     * Puedes llamar mount($id) desde donde incluyas el componente.
     */
    public function mount($id)
    {
        $visualizacion = Visualizacion::find($id);


        $this->visualizacion_id = $visualizacion->id;
        $this->contenido_id = $visualizacion->contenido_id;
        $this->fecha_visualizacion = optional($visualizacion->fecha_visualizacion)->toDateString() ?? Carbon::now()->toDateString();
        $this->minutos_vistos = $visualizacion->minutos_vistos;
        $this->dispositivo = $visualizacion->dispositivo;
        $this->completado = (bool) $visualizacion->completado;
        $this->calificacion = $visualizacion->calificacion;
        $this->progreso_actual = $visualizacion->progreso_actual ?? 0;

        // establecer max_minutos_vistos desde el contenido asociado
        $contenido = Contenido::find($this->contenido_id);
        $this->max_minutos_vistos = $contenido->duracion_minutos ?? 0;
    }

    /**
     * Reglas dinámicas para validación.
     */
    public function rules()
    {
        return [
            'contenido_id'        => 'required|exists:contenidos,id',
            'fecha_visualizacion' => 'required|date',
            'minutos_vistos'      => 'nullable|integer|min:0|max:' . intval($this->max_minutos_vistos),
            'dispositivo'         => 'required|in:mobile,tablet,smart-tv,web,consola',
            'completado'          => 'boolean',
            'calificacion'        => 'nullable|integer|min:1|max:5',
        ];
    }

    /**
     * Mensajes personalizados.
     */
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

    /**
     * Cuando se selecciona un contenido nuevo, actualizamos el máximo permitido.
     */
    public function updatedContenidoId($value)
    {
        $contenido = Contenido::find($value);

        if ($contenido) {
            $this->max_minutos_vistos = $contenido->duracion_minutos ?? 0;
            // Opcional: si el valor actual excede el nuevo máximo, ajustarlo
            if (!is_null($this->minutos_vistos) && intval($this->minutos_vistos) > intval($this->max_minutos_vistos)) {
                $this->minutos_vistos = $this->max_minutos_vistos;
            }
        } else {
            $this->max_minutos_vistos = 0;
        }

        // recalcular progreso con los valores nuevos
        $this->recalcularProgreso();
    }

    /**
     * Mantener el progreso actualizado cuando cambien los minutos.
     */
    public function updatedMinutosVistos($value)
    {
        $this->recalcularProgreso();
    }

    /**
     * Helper para recalcular progreso_actual.
     */
    protected function recalcularProgreso()
    {
        $max = intval($this->max_minutos_vistos);
        $min = is_null($this->minutos_vistos) ? 0 : intval($this->minutos_vistos);

        if ($max > 0) {
            if ($min > $max) {
                $this->minutos_vistos = $max;
                $min = $max;
            } elseif ($min < 0) {
                $this->minutos_vistos = 0;
                $min = 0;
            }
            $this->progreso_actual = round(($min / $max) * 100, 2);
            if ($this->progreso_actual >= 100) {
                $this->completado = true;
            } else {
                $this->completado = false;
            }
        } else {
            $this->progreso_actual = 0;
        }
    }

    /**
     * Actualiza la visualización en la base de datos.
     */
    public function update()
    {
        // Validar con las reglas dinámicas
        $this->validate();

        $visualizacion = Visualizacion::find($this->visualizacion_id);

        if (! $visualizacion) {
            session()->flash('error', 'Visualización no encontrada.');
            return $this->redirectRoute('visualizaciones.index');
        }

        // Opcional: si quieres que la fecha se actualice al momento del edit, descomenta:
        // $this->fecha_visualizacion = Carbon::now()->toDateString();

        $visualizacion->update([
            'contenido_id' => $this->contenido_id,
            'fecha_visualizacion' => $this->fecha_visualizacion,
            'minutos_vistos' => $this->minutos_vistos,
            'dispositivo' => $this->dispositivo,
            'completado' => $this->completado,
            'calificacion' => $this->calificacion,
            'progreso_actual' => $this->progreso_actual,
        ]);

        session()->flash('success', [
            'titulo' => $visualizacion->contenido ? $visualizacion->contenido->titulo : 'Visualización',
            'action' => 'updated',
        ]);

        // Redirigir o cerrar modal según tu flujo
        return $this->redirectRoute('visualizaciones.index', navigate: true);
    }

    /**
     * Cancelar / cerrar: si usas modal, puedes cerrarlo o redirigir.
     */
    public function cancel()
    {
        $this->open = false;
        // return $this->redirectRoute('visualizaciones.index'); // opcional
    }

    public function render()
    {
        return view('livewire.visualizaciones.edit', [
            'contenidos' => Contenido::select('id', 'titulo')->get(),
            'usuario' => Auth::user() ?? null,
            'progreso' => $this->progreso_actual,
            'max_minutos_vistos' => $this->max_minutos_vistos,
        ]);
    }
}
