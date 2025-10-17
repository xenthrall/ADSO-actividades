<?php

namespace App\Http\Controllers;

use App\Models\estado;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoStoreRequest;
use App\Http\Requests\EstadoUpdateRequest;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = estado::all();
        return view('estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoStoreRequest $request)
{
    Estado::create($request->validated());
    return redirect()->route('estado.index')->with('success', 'Estado creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estado = estado::find($id);
        return view('estado.editar',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoUpdateRequest $request, Estado $estado)
{
    $estado->update($request->validated());
    return redirect()->route('estado.index')->with('success', 'Estado actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estado = estado::find($id);
        $estado->delete();
        return redirect()->route('estado.index')->with('success','estado eliminado exitosamente.');
    }
}
