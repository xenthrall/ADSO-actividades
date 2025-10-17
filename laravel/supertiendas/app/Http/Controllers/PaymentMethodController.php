<?php

namespace App\Http\Controllers;

use App\Models\paymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = paymentMethod::all();
        return view('payment.index',compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentStoreRequest $request)
{
    PaymentMethod::create($request->validated());
    return redirect()->route('payment.index')->with('success', 'Método creado con éxito.');
}

    /**
     * Display the specified resource.
     */
    public function show(paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $method = paymentMethod::find($id);
        return view('payment.editar',compact('method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, PaymentMethod $payment)
{
    $payment->update($request->validated());
    return redirect()->route('payment.index')->with('success', 'Método actualizado.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $method = paymentMethod::find($id);
        $method->delete();
        return redirect()->route('payment.index')->with('success','Metodo de pago eliminado exitosamente');
    }
}
