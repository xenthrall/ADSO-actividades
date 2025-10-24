<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\categoria;
use App\Models\estado;
use App\Models\marca;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    // --- filtros existentes ---
    $search = $request->get('search');
    $categoriaId = $request->get('categoria_id');
    $marcaId = $request->get('marca_id');
    $estado = $request->get('estado');

    $query = Producto::with(['categoria', 'marca']);

    if ($search) {
        $query->where(function($query) use ($search) {
            $query->where('nombre', 'LIKE', "%{$search}%")
                ->orWhere('descripcion', 'LIKE', "%{$search}%");
        });
    }

    if ($categoriaId) {
        $query->where('idcategoria', $categoriaId);
    }

    if ($marcaId) {
        $query->where('idmarca', $marcaId);
    }

    if ($estado !== null) {
        $query->where('estado', $estado);
    }

    $sort = $request->get('sort', 'nombre');
    $direction = $request->get('direction', 'asc');
    $query->orderBy($sort, $direction);

    $productos = $query->paginate(200);
    $categorias = Categoria::all();
    $marcas = Marca::all();

    // 🔹 Agrupar productos por categoría
    $productosPorCategoria = Producto::selectRaw('categorias.nombre as categoria, COUNT(productos.id) as total')
        ->join('categorias', 'productos.idcategoria', '=', 'categorias.id')
        ->groupBy('categorias.nombre')
        ->get();

    // Preparar datos para Chart.js
    $labels = $productosPorCategoria->pluck('categoria');
    $data = $productosPorCategoria->pluck('total');

    return view('producto.index', compact(
        'productos', 'categorias', 'marcas',
        'search', 'categoriaId', 'marcaId', 'estado',
        'labels', 'data'
    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = estado::all();
        $categorias = categoria::all();
        $marcas = marca::all();
        return view('producto.crear',compact('categorias','marcas','estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
{
    Producto::create($request->validated());
    return redirect()->route('producto.index')->with('success', 'Producto creado con éxito.');
}

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = estado::all();
        $categorias = categoria::all();
        $marcas = marca::all();
        $producto = producto::find($id);
        return view('producto.editar', compact('producto','categorias','marcas','estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
{
    $producto->update($request->validated());
    return redirect()->route('producto.index')->with('success', 'Producto actualizado con éxito.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index')->with('success','Producto eliminado exitosamente.');
    }

    public function verpdfproducto(){

        $productos = Producto::with(['categoria', 'marca'])
            ->orderBy('idcategoria')
            ->orderBy('nombre')
            ->get();

        return view('pdf.productopdf', compact('productos'));

    }

    public function generarpdfproducto(){

        $productos = Producto::with(['categoria', 'marca'])
            ->orderBy('idcategoria')
            ->orderBy('nombre')
            ->get();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar la vista Blade y pasar los datos
        $html = view('pdf.productopdf', compact('productos'))->render();
        $dompdf->loadHtml($html);

        //Configurar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'landscape');

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF generado
        return $dompdf->stream('productos.pdf');
    }
}
