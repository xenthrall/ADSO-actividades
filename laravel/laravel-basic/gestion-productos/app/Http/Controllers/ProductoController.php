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

    /**
     * ✅ MÉTODO RENOMBRADO
     * Renombramos 'update' a 'showUpdateForm' para evitar conflictos.
     * Su única responsabilidad es mostrar la vista con todos los productos.
     */
    public function showUpdateForm()
    {
        $productos = Producto::all();
        return view('productos.update', compact('productos'));
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

    public function edit($id){
        $producto = Producto::findorfail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * ✅ MÉTODO DE ACTUALIZACIÓN COMPLETADO
     * Este método recibe los datos del formulario y actualiza el producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // 1. Validar los datos recibidos (similar a 'store')
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);
        
        // 2. Encontrar el producto que se va a actualizar
        $producto = Producto::findOrFail($id);
        
        // 3. Actualizar el producto con todos los datos del request
        $producto->update($request->all());

        // 4. Redireccionar de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->back();
    }
}