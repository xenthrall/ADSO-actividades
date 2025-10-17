<?php

namespace App\Http\Controllers;

use App\Service\DashService;


class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpis_requeridos = [
            'ventas' => 'dash.ventas',
            'inventario' => 'dash.inventario',
            'clientes' => 'dash.clientes',
            'financieros' => 'dash.financieros'
        ];
        return view('dash.index', compact('kpis_requeridos'));
    }

    public function ventas(DashService $dash)
    {
        return view('dash.ventas', [
            'ventasMes'       => $dash->ventasMesActual(),
            'tasaCrecimiento' => $dash->tasaCrecimientoMensual(),
            'ticketPromedio'  => $dash->ticketPromedio(),
            'ventasCategoria' => $dash->ventasPorCategoria(),
            'topProductos'    => $dash->topProductos(),

        ]);
    }

    public function inventario(DashService $dash)
    {
        return view('dash.inventario', [
            'rotacion'          => $dash->rotacionInventario(),
            'valorInventario'   => $dash->valorInventario(),
            'porcentajeBajo'    => $dash->porcentajeStockBajo(),
            'productosSinStock' => $dash->productosSinStock(),
        ]);
    }

    public function clientes(DashService $dash)
    {
        return view('dash.clientes', [
            'clientesNuevos'    => $dash->clientesNuevosMes(),
            'tasaRetencion'     => $dash->tasaRetencion(),
            'valorPromCliente'  => $dash->valorPromedioCliente(),
            'distribGenero'     => $dash->distribucionGenero(),
        ]);
    }


    public function financieros(DashService $dash)
{
    return view('dash.financieros', [
        'margenPromedio'         => $dash->margenPromedio(),
        'roiCategorias'          => $dash->roiPorCategoria(),
        'markupPromedio'         => $dash->markupPromedio(),
        'costoInventarioVentas'  => $dash->costoInventarioVsVentas(),
    ]);
}
}
