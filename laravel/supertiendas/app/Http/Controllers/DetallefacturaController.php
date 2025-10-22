<?php

namespace App\Http\Controllers;

use App\Models\detallefactura;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetalleRequest;
use App\Http\Requests\UpdateDetalleRequest;
use App\Models\factura;
use App\Models\producto;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetallefacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
    {
        // --- 1. OBTENER PARÁMETROS DE FILTRO ---
        $fecha_inicio = $request->get('fecha_inicio');
        $fecha_fin = $request->get('fecha_fin');
        $producto_id = $request->get('producto_id');
        $cantidad_min = $request->get('cantidad_min');
        $cantidad_max = $request->get('cantidad_max');
        $total_min = $request->get('total_min');
        $total_max = $request->get('total_max');

        // --- 2. CONSULTA PRINCIPAL (TABLA) ---
        $query = Detallefactura::with(['factura', 'producto']);

        // Filtro por Rango de Fechas
        if ($fecha_inicio && $fecha_fin) {
            $query->whereHas('factura', function ($q) use ($fecha_inicio, $fecha_fin) {
                $q->whereBetween('fecha', [$fecha_inicio, $fecha_fin]);
            });
        }

        // Filtro por Producto
        if ($producto_id) {
            $query->where('idproducto', $producto_id);
        }

        // Filtro por Rango de Cantidad
        if ($cantidad_min !== null) {
            $query->where('cantidad', '>=', $cantidad_min);
        }
        if ($cantidad_max !== null) {
            $query->where('cantidad', '<=', $cantidad_max);
        }

        // Filtro por Rango de Total de Línea
        if ($total_min !== null) {
            $query->where('totallinea', '>=', $total_min);
        }
        if ($total_max !== null) {
            $query->where('totallinea', '<=', $total_max);
        }

        // Ordenar y Paginar
        $query->orderBy('id', 'desc');
        $detallesFactura = $query->paginate(50);

        // --- 3. OBTENER PRODUCTOS PARA FILTRO ---
        $productos = producto::select('productos.*')
            ->join('detallefacturas', 'productos.id', '=', 'detallefacturas.idproducto')
            ->distinct()
            ->orderBy('productos.nombre')
            ->get();

        // --- 4. PREPARAR DATOS PARA GRÁFICOS ---
        // (Aplicamos los mismos filtros a las consultas de gráficos)

        // Gráfico 1: Top 5 Productos por Cantidad Vendida
        $queryTopCantidad = detallefactura::select(
                'productos.nombre',
                DB::raw('SUM(detallefacturas.cantidad) as total_cantidad')
            )
            ->join('productos', 'detallefacturas.idproducto', '=', 'productos.id');

        // Gráfico 2: Top 5 Productos por Ingresos (Total Línea)
        $queryTopIngresos = detallefactura::select(
                'productos.nombre',
                DB::raw('SUM(detallefacturas.totallinea) as total_ingresos')
            )
            ->join('productos', 'detallefacturas.idproducto', '=', 'productos.id');
        
        // Aplicar filtros de fecha a ambos gráficos
        if ($fecha_inicio && $fecha_fin) {
            $queryTopCantidad->join('facturas', 'detallefacturas.idfactura', '=', 'facturas.id')
                             ->whereBetween('facturas.fecha', [$fecha_inicio, $fecha_fin]);
            
            $queryTopIngresos->join('facturas', 'detallefacturas.idfactura', '=', 'facturas.id')
                             ->whereBetween('facturas.fecha', [$fecha_inicio, $fecha_fin]);
        }

        // Aplicar filtro de producto a ambos gráficos
        if ($producto_id) {
            $queryTopCantidad->where('detallefacturas.idproducto', $producto_id);
            $queryTopIngresos->where('detallefacturas.idproducto', $producto_id);
        }

        $topProductosCantidad = $queryTopCantidad
            ->groupBy('productos.nombre')
            ->orderByDesc('total_cantidad')
            ->take(5)
            ->get();
        
        $topProductosIngresos = $queryTopIngresos
            ->groupBy('productos.nombre')
            ->orderByDesc('total_ingresos')
            ->take(5)
            ->get();

        // Preparar datos para Chart.js
        $labelsTopCantidad = $topProductosCantidad->pluck('nombre');
        $dataTopCantidad = $topProductosCantidad->pluck('total_cantidad');
        
        $labelsTopIngresos = $topProductosIngresos->pluck('nombre');
        $dataTopIngresos = $topProductosIngresos->pluck('total_ingresos');


        // --- 5. RETORNAR VISTA CON TODOS LOS DATOS ---
        return view('detallefactura.index', compact(
            'detallesFactura',
            'productos',
            'fecha_inicio',
            'fecha_fin',
            'producto_id',
            'cantidad_min',
            'cantidad_max',
            'total_min',
            'total_max',
            // Datos para gráficos
            'labelsTopCantidad',
            'dataTopCantidad',
            'labelsTopIngresos',
            'dataTopIngresos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = producto::all();
        $facturas = factura::all();
        return view('detallefactura.crear', compact('productos', 'facturas'));
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
        return view('detallefactura.editar', compact('facturas', 'productos', 'detallefactura'));
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
        return redirect()->route('detalle.index')->with('success', 'Detalle de factura eliminado exitosamente.');
    }

    public function verpdfdetalle()
    {
        $detallesFactura = detallefactura::with(['factura', 'producto'])->orderBy('id', 'desc')->get();
        return view('pdf.detallefacturapdf', compact('detallesFactura'));
    }

    public function generarpdfdetalle()
    {
        $detallesFactura = detallefactura::with(['factura', 'producto'])->orderBy('id', 'desc')->get();
        
        
        $dompdf = new Dompdf();

        $html = view('pdf.detallefacturapdf', compact('detallesFactura'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('detallefactura.pdf');
    }
}
