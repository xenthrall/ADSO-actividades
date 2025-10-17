<?php

namespace App\Http\Controllers;

use App\Models\detallefactura;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetalleRequest;
use App\Http\Requests\UpdateDetalleRequest;
use App\Models\factura;
use App\Models\producto;
use Illuminate\Http\Request;

class DetallefacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallefacturas = detallefactura::all();
        return view('detallefactura.index',compact('detallefacturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = producto::all();
        $facturas = factura::all();
        return view('detallefactura.crear',compact('productos', 'facturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetalleRequest $request)
{
    detallefactura::create($request->validated());

    return redirect()->route('detalle.index')->with('success', 'Detalle creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(detallefactura $detallefactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $facturas = factura::all();
        $productos = producto::all();
        $detallefactura = detallefactura::find($id);
        return view('detallefactura.editar',compact('facturas','productos','detallefactura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalleRequest $request, String $id)
{
    detallefactura::find($id)->update($request->validated());

    return redirect()->route('detalle.index')->with('success', 'Detalle actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $detallefactura = detallefactura::find($id);
        $detallefactura->delete();
        return redirect()->route('detalle.index')->with('success','Detalle de factura eliminado exitosamente.');
    }
}
