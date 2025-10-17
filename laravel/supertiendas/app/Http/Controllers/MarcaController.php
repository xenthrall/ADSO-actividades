<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMarcaRequest;
use App\Http\Requests\StoreMarcaRequest;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = marca::all();
        return view('marca.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marca.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcaRequest $request)
{
    Marca::create($request->validated());

    return redirect()->route('marca.index')->with('success', 'Marca creada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = marca::find($id);
        return view('marca.editar',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, Marca $marca)
{
    $marca->update($request->validated());

    return redirect()->route('marca.index')->with('success', 'Marca actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = marca::find($id);
        $marca->delete();
        return redirect()->route('marca.index')->with('success','Eliminación exitosa');
    }
}
