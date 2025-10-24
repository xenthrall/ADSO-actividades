<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Resumido de Detalles</title>
    <style>
        /* Importante para que Dompdf muestre ñ, tildes y símbolos */
        @page {
            margin: 25px;
        }
        body {
            font-family: DejaVu Sans, sans-serif; 
            font-size: 11px;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            margin: 0;
            line-height: 1.4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            text-align: center;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }

        .header-table, .summary-table {
            width: 100%;
            border: none;
            margin-bottom: 20px;
        }
        .header-table td {
            border: none;
            vertical-align: top;
            padding: 0;
        }
        .summary-table td {
            border: 1px solid #eee;
            padding: 8px;
            font-size: 12px;
        }
        .summary-table .label {
            font-weight: bold;
            background-color: #f9f9f9;
            width: 30%;
        }

        .logo {
            width: 80px;
        }
        
        .filter-box {
            border: 1px solid #aaa;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fdfdfd;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
            color: #888;
        }
        .total-row {
            background-color: #f5f5f5;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td style="width: 20%; text-align: left;">
                <img src="https://caprendizaje.sena.edu.co/sgva/Images/logoSena1.png" alt="Logo" class="logo">
            </td>
            <td style="width: 60%; text-align: center;">
                <h1 style="font-size: 20px;">SISTEMA CATA</h1>
                <h2 style="font-size: 16px;">Reporte Resumido de Detalles de Factura</h2>
                <p style="font-size: 10px; margin:0;"><strong>NIT:</strong> 900123456-7</p>
            </td>
            <td style="width: 20%; text-align: right; font-size: 10px;">
                <strong>Generado:</strong><br>
                {{ \Carbon\Carbon::now()->format('d/m/Y H:i A') }}
            </td>
        </tr>
    </table>

    <div class="filter-box">
        <h3 style="text-align: left; font-size: 13px; margin-bottom: 8px;">Filtros Aplicados</h3>
        <table style="border: none; margin-top: 0; font-size: 11px;">
            <tr style="border: none;">
                <td style="border: none; padding: 2px;"><strong>Rango de Fechas:</strong></td>
                <td style="border: none; padding: 2px;">
                    @if ($fecha_inicio && $fecha_fin)
                        Del {{ \Carbon\Carbon::parse($fecha_inicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fecha_fin)->format('d/m/Y') }}
                    @else
                        Todos los registros
                    @endif
                </td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 2px;"><strong>Producto:</strong></td>
                <td style="border: none; padding: 2px;">
                    {{ $producto->nombre ?? 'Todos los productos' }}
                </td>
            </tr>
        </table>
    </div>

    <h3>Resumen General</h3>
    <table class="summary-table">
        <tr>
            <td class="label">Total Facturas Únicas</td>
            <td>{{ number_format($resumenGeneral->total_facturas, 0, ',', '.') }}</td>
            <td class="label">Total Líneas de Detalle</td>
            <td>{{ number_format($resumenGeneral->total_lineas, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Total Unidades Vendidas</td>
            <td>{{ number_format($resumenGeneral->total_cantidad_vendida, 0, ',', '.') }}</td>
            <td class="label">Promedio por Línea</td>
            <td>${{ number_format($resumenGeneral->promedio_por_linea, 0, ',', '.') }}</td>
        </tr>
        <tr style="font-size: 14px; background-color: #f0f5ff;">
            <td class="label">VALOR TOTAL FACTURADO</td>
            <td colspan="3" style="font-weight: bold; text-align: right;">
                ${{ number_format($resumenGeneral->valor_total_facturado, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    @if($resumenPorProducto->count() > 0)
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
                @foreach ($resumenPorProducto as $item)
                    <tr>
                        <td>{{ $item->producto_nombre ?? 'Sin nombre' }}</td>
                        <td class="text-center">{{ number_format($item->total_cantidad, 0, ',', '.') }}</td>
                        <td class="text-right">${{ number_format($item->total_facturado, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2">TOTAL GENERAL</td>
                    <td class="text-right">${{ number_format($resumenPorProducto->sum('total_facturado'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif


    @if($resumenPorFecha->count() > 0)
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
                @foreach ($resumenPorFecha as $item)
                    <tr>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->fecha_factura)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ number_format($item->total_cantidad, 0, ',', '.') }}</td>
                        <td class="text-right">${{ number_format($item->total_facturado, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2">TOTAL GENERAL</td>
                    <td class="text-right">${{ number_format($resumenPorFecha->sum('total_facturado'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    <div class="footer">
        <p>Reporte generado por Sistema CATA</p>
    </div>

</body>
</html>