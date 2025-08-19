<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create(){
        // Logic to create a new client
        return view('clientes.create');

    }

    public function store(Request $request){
        

        $cliente = new Cliente();
        $cliente->nombre = $request-> nombre;
        $cliente->apellido = $request-> apellido;
        $cliente->direccion = $request-> direccion;
        $cliente->fecha_nacimiento = $request-> fecha_nacimiento;
        $cliente->telefono = $request-> telefono;
        $cliente->email = $request-> email;
        $cliente->fecha_registro = $request-> fecha_registro;
        $cliente->genero = $request-> genero;

        $cliente->save();

        return redirect()->back()->with('success', 'Cliente creado exitosamente.');
    }
}
