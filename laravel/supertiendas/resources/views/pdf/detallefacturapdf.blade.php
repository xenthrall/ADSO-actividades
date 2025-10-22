<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Detalles de Facturas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1, h3 {
            text-align: center;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .summary {
            margin-top: 20px;
        }

        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-success { background-color: #28a745; color: white; }
        .badge-warning { background-color: #ffc107; color: black; }
        .badge-danger  { background-color: #dc3545; color: white; }
        .badge-secondary { background-color: #6c757d; color: white; }
    </style>
</head>
<body>

    <div class="header">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="https://caprendizaje.sena.edu.co/sgva/Images/logoSena1.png"
                 alt="Logo"
                 style="height: 100px; width: 100px; margin-right: 10px;">
            <h1 style="margin: 0; font-size: 24px;">SISTEMA CATA</h1>
        </div>
        <p><strong>NIT:</strong> 900123456-7</p>
        <h2>Reporte de Detalles de Facturas</h2>
        <p><strong>Fecha de generación:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </div>

    <!-- 🔹 Resumen General -->
    <table style="width: 100%; border: none; margin-bottom: 20px;">
        <tr>
            <td style="border: none;"><strong>Total Registros:</strong> {{ $detallesFactura->count() }}</td>
            <td style="border: none;"><strong>Total Facturas:</strong> {{ $detallesFactura->pluck('idfactura')->unique()->count() }}</td>
            <td style="border: none;"><strong>Total Productos Vendidos:</strong> {{ number_format($detallesFactura->sum('cantidad')) }}</td>
        </tr>
        <tr>
            <td style="border: none;"><strong>Valor Total Facturado:</strong> ${{ number_format($detallesFactura->sum('totallinea'), 0, ',', '.') }}</td>
            <td style="border: none;"><strong>Promedio por Factura:</strong> ${{ number_format($detallesFactura->groupBy('idfactura')->map->sum('totallinea')->avg(), 0, ',', '.') }}</td>
            <td style="border: none;"><strong>Promedio por Línea:</strong> ${{ number_format($detallesFactura->avg('totallinea'), 0, ',', '.') }}</td>
        </tr>
    </table>

    <!-- 🔹 Listado Detallado -->
    <h3>Listado Detallado</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Factura</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total Línea</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detallesFactura as $detalle)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">#{{ $detalle->factura->id ?? 'N/A' }}</td>
                    <td class="text-center">{{ optional($detalle->factura)->fecha ? \Carbon\Carbon::parse($detalle->factura->fecha)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $detalle->factura->cliente->nombre ?? 'N/A' }}</td>
                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                    <td class="text-center">{{ $detalle->cantidad }}</td>
                    <td class="text-right">${{ number_format($detalle->preciounitario, 0, ',', '.') }}</td>
                    <td class="text-right">${{ number_format($detalle->totallinea, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 🔹 Resumen por Producto -->
    <div class="summary">
        <h3>Resumen por Producto</h3>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad Vendida</th>
                    <th>Total Facturado</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $productos = $detallesFactura->groupBy('producto.nombre');
                @endphp
                @foreach ($productos as $nombreProducto => $items)
                    <tr>
                        <td>{{ $nombreProducto ?? 'Sin nombre' }}</td>
                        <td class="text-center">{{ $items->sum('cantidad') }}</td>
                        <td class="text-right">${{ number_format($items->sum('totallinea'), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr style="background-color: #f8f9fa; font-weight: bold;">
                    <td>TOTAL GENERAL</td>
                    <td class="text-center">{{ $detallesFactura->sum('cantidad') }}</td>
                    <td class="text-right">${{ number_format($detallesFactura->sum('totallinea'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- 🔹 Resumen por Fecha -->
    <div class="summary">
        <h3>Resumen por Fecha</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad Total</th>
                    <th>Valor Facturado</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $porFecha = $detallesFactura->groupBy(function($item) {
                        return optional($item->factura)->fecha ? \Carbon\Carbon::parse($item->factura->fecha)->format('d/m/Y') : 'Sin Fecha';
                    });
                @endphp
                @foreach ($porFecha as $fecha => $items)
                    <tr>
                        <td>{{ $fecha }}</td>
                        <td class="text-center">{{ $items->sum('cantidad') }}</td>
                        <td class="text-right">${{ number_format($items->sum('totallinea'), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr style="background-color: #f8f9fa; font-weight: bold;">
                    <td>TOTAL GENERAL</td>
                    <td class="text-center">{{ $detallesFactura->sum('cantidad') }}</td>
                    <td class="text-right">${{ number_format($detallesFactura->sum('totallinea'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px; text-align: center; font-size: 10px; color: #666;">
        <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} por Sistema CATA</p>
    </div>

</body>
</html>
