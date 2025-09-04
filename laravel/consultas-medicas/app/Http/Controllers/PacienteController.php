<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
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
    public function store(PacienteRequest $request)
    {
        //
        Paciente::create($request->all());
        return redirect()->back()->with('success', 'Paciente ' . $request->nombre . ' creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $paciente = Paciente::findorfail($id);
        $paciente->update($request->all());

        return redirect()->back()->with('success', 'Paciente ' . $paciente->nombre . ' actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $paciente = Paciente::FindOrFail($id);
        $paciente->delete();
        return redirect()->back()->with('success', 'Paciente ' . $paciente->nombre . ' eliminado exitosamente.');
    }
}
