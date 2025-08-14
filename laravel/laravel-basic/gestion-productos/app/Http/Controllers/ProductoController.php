<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->precio_compra = $request->precio_compra;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->back()->with('success', 'Producto creado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findorfail($id);
        $producto->delete();

        return redirect()->route('producto.index');
    }
}
