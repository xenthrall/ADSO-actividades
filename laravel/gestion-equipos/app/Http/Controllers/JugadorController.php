<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jugadores = Jugador::all();
        $equipos = Equipo::all();
        return view('jugadores.index', compact('jugadores', 'equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $equipos = Equipo::all();
        return view('jugadores.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Jugador::create($request->all());
        return redirect()->route('jugadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jugador $jugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipos = Equipo::all();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $jugador = Jugador::findOrFail($id);
        $jugador->update($request->all());
        return redirect()->route('jugadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $jugador = Jugador::FindOrFail($id);
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
