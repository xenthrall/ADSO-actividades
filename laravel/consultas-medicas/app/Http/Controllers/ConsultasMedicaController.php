<?php

namespace App\Http\Controllers;

use App\Models\ConsultasMedica;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultasMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('nombre')->get();

        $consultas = ConsultasMedica::with('paciente')->get();
        return view('consultas_medicas.index', compact('consultas', 'pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ConsultasMedica::create($request->all());
        return redirect()->back()->with('success', 'Consulta médica creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsultasMedica $consultasMedica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConsultasMedica $consultasMedica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $consultasMedica = ConsultasMedica::findorfail($id);
        $consultasMedica->update($request->all());

        return redirect()->back()->with('success', 'Consulta médica actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $consultasMedica = ConsultasMedica::FindOrFail($id);
        $consultasMedica->delete();
        return redirect()->back()->with('success', 'Consulta médica eliminada exitosamente.');
    }
}
