<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Http\Controllers\Controller;
use App\Http\Requests\Factura\FacturaStoreRequest;
use App\Http\Requests\Factura\FacturaUpdateRequest;
use App\Models\cliente;
use App\Models\estado;
use App\Models\paymentMethod;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = factura::all();
        return view('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = cliente::all();
        $estados = estado::all();
        $modospago = paymentMethod::all();
        return view('factura.crear',compact('clientes','estados','modospago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturaStoreRequest $request) {
        factura::create($request->validated());
        return redirect()->route('factura.index')->with('success','Factura creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = cliente::all();
        $estados = estado::all();
        $modospago = paymentMethod::all();
        $factura = factura::find($id);
        return view('factura.editar',compact('clientes','estados','modospago', 'factura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacturaUpdateRequest $request, $id) {
        factura::find($id)->update($request->validated());
        return redirect()->route('factura.index')->with('success','Factura actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = factura::find($id);
        $factura->delete();
        return redirect()->route('factura.index')->with('success','Factura eliminada exitosamente');
    }
}
