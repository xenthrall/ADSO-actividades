<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashService
{
    protected $startMonth;
    protected $endMonth;

    public function __construct()
    {
        $this->startMonth = Carbon::now()->startOfMonth();
        $this->endMonth = Carbon::now()->endOfMonth();
    }

    /** ===============================
     * MÉTRICAS DE VENTAS
     * =============================== */

    // 1. Ventas totales del mes actual
    public function ventasMesActual()
    {
        return DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->sum('total');
    }

    // 2. Tasa de crecimiento mensual
    public function tasaCrecimientoMensual()
    {
        $ventasActual = $this->ventasMesActual();

        $ventasAnterior = DB::table('facturas')
            ->whereBetween('fecha', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])
            ->sum('total');

        if ($ventasAnterior == 0) {
            return null;
        }

        return (($ventasActual - $ventasAnterior) / $ventasAnterior) * 100;
    }

    // 3. Ticket promedio (por factura)
    public function ticketPromedio()
    {
        return DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->avg('total');
    }


    // 4. Top 5 productos más vendidos
    public function topProductos($limit = 5)
    {
        return DB::table('detallefacturas as df')
            ->join('productos as p', 'p.id', '=', 'df.idproducto')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->whereBetween('f.fecha', [$this->startMonth, $this->endMonth])
            ->select('p.nombre', DB::raw('SUM(df.cantidad) as total_vendidos'))
            ->groupBy('p.nombre')
            ->orderByDesc('total_vendidos')
            ->limit($limit)
            ->get();
    }

    // 5. Ventas por categoría
    public function ventasPorCategoria()
    {
        return DB::table('detallefacturas as df')
            ->join('productos as p', 'p.id', '=', 'df.idproducto')
            ->join('categorias as c', 'c.id', '=', 'p.idcategoria')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->whereBetween('f.fecha', [$this->startMonth, $this->endMonth])
            ->select('c.nombre', DB::raw('SUM(df.totallinea) as ventas'))
            ->groupBy('c.nombre')
            ->orderByDesc('ventas')
            ->get();
    }

    /** ===============================
     * MÉTRICAS DE INVENTARIO
     * =============================== */

    // 1. Rotación de inventario (ventas / inventario promedio)
    public function rotacionInventario()
    {
        // Total de unidades vendidas en los últimos 12 meses
        $ventas12m = DB::table('detallefacturas as df')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->where('f.fecha', '>=', Carbon::now()->subYear())
            ->sum('df.cantidad');

        // Inventario total actual (stock disponible)
        $inventarioTotal = DB::table('productos')->sum('stock');

        // Cálculo de rotación
        return $inventarioTotal ? $ventas12m / $inventarioTotal : null;
    }

    // 2. Porcentaje de productos con bajo stock
    public function porcentajeStockBajo($umbral = 10)
    {
        $total = DB::table('productos')->count();
        $bajo = DB::table('productos')->where('stock', '<', $umbral)->count();

        return $total ? ($bajo / $total) * 100 : 0;
    }

    // 3. Valor total del inventario
    public function valorInventario()
    {
        return DB::table('productos')
            ->select(DB::raw('SUM(stock * preciocompra) as valor'))
            ->value('valor');
    }

    // 4. Productos sin stock
    public function productosSinStock()
    {
        return DB::table('productos')
            ->where('stock', 0)
            ->select('id', 'nombre', 'stock')
            ->get();
    }

    /** ===============================
     * CLIENTES
     * =============================== */

    // 1. Clientes nuevos del mes
    public function clientesNuevosMes()
    {
        return DB::table('clientes')
            ->whereBetween('created_at', [$this->startMonth, $this->endMonth])
            ->count();
    }

    // 2. Tasa de retención de clientes
    public function tasaRetencion()
    {
        $clientesPrev = DB::table('facturas')
            ->whereBetween('fecha', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])
            ->pluck('idcliente')
            ->unique()
            ->toArray();

        $clientesCurr = DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->pluck('idcliente')
            ->unique()
            ->toArray();

        $retained = count(array_intersect($clientesPrev, $clientesCurr));
        $totalPrev = count($clientesPrev);

        return $totalPrev ? ($retained / $totalPrev) * 100 : null;
    }

    // 3. Valor promedio por cliente
    public function valorPromedioCliente()
    {
        $total = DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->sum('total');

        $clientes = DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->distinct()
            ->count('idcliente');

        return $clientes ? $total / $clientes : null;
    }

    // 4. Distribución por género
    public function distribucionGenero()
    {
        return DB::table('clientes')
            ->select('genero', DB::raw('COUNT(*) as total'))
            ->groupBy('genero')
            ->get();
    }

    /** ===============================
     * Financieros
     * =============================== */

    // 1. Margen de ganancia promedio ponderado
    public function margenPromedio()
    {
        $data = DB::table('detallefacturas as df')
            ->join('productos as p', 'p.id', '=', 'df.idproducto')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->whereBetween('f.fecha', [$this->startMonth, $this->endMonth])
            ->select(
                DB::raw('SUM((p.precio - p.preciocompra) * df.cantidad) as total_margen'),
                DB::raw('SUM(df.cantidad) as total_unidades')
            )
            ->first();

        return $data->total_unidades ? $data->total_margen / $data->total_unidades : null;
    }

    // 2. ROI por categoría
    public function roiPorCategoria()
    {
        return DB::table('detallefacturas as df')
            ->join('productos as p', 'p.id', '=', 'df.idproducto')
            ->join('categorias as c', 'c.id', '=', 'p.idcategoria')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->whereBetween('f.fecha', [$this->startMonth, $this->endMonth])
            ->select(
                'c.nombre',
                DB::raw('SUM(df.totallinea) as ventas'),
                DB::raw('SUM(p.preciocompra * df.cantidad) as costo')
            )
            ->groupBy('c.nombre')
            ->get()
            ->map(function ($row) {
                $roi = $row->costo ? (($row->ventas - $row->costo) / $row->costo) * 100 : null;
                return [
                    'categoria' => $row->nombre,
                    'ventas' => $row->ventas,
                    'costo' => $row->costo,
                    'roi_percent' => $roi,
                ];
            });
    }

    // 3. Eficiencia en precios de compra vs venta
    public function markupPromedio()
    {
        $data = DB::table('detallefacturas as df')
            ->join('productos as p', 'p.id', '=', 'df.idproducto')
            ->join('facturas as f', 'f.id', '=', 'df.idfactura')
            ->whereBetween('f.fecha', [$this->startMonth, $this->endMonth])
            ->select(
                DB::raw('SUM(((p.precio - p.preciocompra)/NULLIF(p.preciocompra,0)) * df.cantidad) as markup_total'),
                DB::raw('SUM(df.cantidad) as total_unidades')
            )
            ->first();

        return $data->total_unidades ? ($data->markup_total / $data->total_unidades) * 100 : null;
    }

    // 4. Costos de inventario vs ventas
    public function costoInventarioVsVentas()
    {
        // Valor total del inventario actual
        $valorInventario = DB::table('productos')
            ->select(DB::raw('SUM(stock * preciocompra) as valor'))
            ->value('valor');

        // Ventas del mes actual
        $ventasPeriodo = DB::table('facturas')
            ->whereBetween('fecha', [$this->startMonth, $this->endMonth])
            ->sum('total');

        return $ventasPeriodo ? ($valorInventario / $ventasPeriodo) * 100 : null;
    }
}
