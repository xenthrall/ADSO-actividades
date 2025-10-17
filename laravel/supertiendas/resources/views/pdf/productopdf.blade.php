<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1, h3 {
            text-align: center;
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

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            margin-top: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        .badge-warning {
            background-color: #ffc107;
            color: black;
        }

        .badge-danger {
            background-color: #dc3545;
            color: white;
        }

        .badge-secondary {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

    <div class="header">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="https://caprendizaje.sena.edu.co/sgva/Images/logoSena1.png" alt="Logo"
                 style="height: 100px; width: 100px; margin-right: 10px;">
            <h1 style="margin: 0; font-size: 24px;">SISTEMA CATA</h1>
        </div>
        <p style="margin-bottom: 20px;"><strong>NIT:</strong> 900123456-7</p>
        <h2>Reporte de Productos</h2>
        <p><strong>Fecha de generación:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </div>

    <!-- Resumen General -->
    <table style="width: 100%; border: none; margin-bottom: 20px;">
        <tr>
            <td style="border: none; padding: 5px;"><strong>Total Productos:</strong> {{ $productos->count() }}</td>
            <td style="border: none; padding: 5px;"><strong>Productos Activos:</strong>
                 {{
                 $productos->where('estado', true)->count()
                }}</td>
            <td style="border: none; padding: 5px;"><strong>Productos Inactivos:</strong> {{ $productos->where('estado', false)->count() }}</td>
        </tr>
        <tr>
            <td style="border: none; padding: 5px;"><strong>Valor Total Inventario:</strong>
                ${{ number_format($productos->sum(function($p) {
                    return $p->precio * $p->stock;
                    }), 0, ',', '.') }}
            </td>
            <td style="border: none; padding: 5px;"><strong>Productos con Stock Bajo:</strong> {{ $productos->where('stock', '<', 10)->count() }}</td>
            <td style="border: none; padding: 5px;"><strong>Productos sin Stock:</strong> {{ $productos->where('stock', 0)->count() }}</td>
        </tr>
    </table>

    <h3>Listado de Productos</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Precio Venta</th>
                <th>Precio Compra</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Valor en Inventario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if($producto->stock < 10 )
                    <tr>
                    <td class="text-center">{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                    <td>{{ $producto->marca->nombre ?? 'N/A' }}</td>
                    <td class="text-right">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                    <td class="text-right">${{ number_format($producto->preciocompra, 0, ',', '.') }}</td>
                    <td class="text-center">
                        @if($producto->stock == 0)
                            <span class="badge badge-danger">SIN STOCK</span>
                        @elseif($producto->stock < 10)
                            <span class="badge badge-warning">{{ $producto->stock }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($producto->estado)
                            <span class="badge badge-secondary">INACTIVO</span>
                        @endif
                    </td>
                    <td class="text-right">${{ number_format($producto->precio * $producto->stock, 0, ',', '.') }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Resumen por Categoría -->
    <div class="summary">
        <h3>Resumen por Categoría</h3>
        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Cantidad de Productos</th>
                    <th>Valor Total Inventario</th>
                    <th>Stock Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $categorias = $productos->groupBy('categoria.nombre');
                @endphp
                @foreach ($categorias as $categoriaNombre => $productosCategoria)
                    <tr>
                        <td>{{ $categoriaNombre ?? 'Sin Categoría' }}</td>
                        <td class="text-center">{{ $productosCategoria->count() }}</td>
                        <td class="text-right">${{ number_format($productosCategoria->sum(function($p) { return $p->precio * $p->stock; }), 0, ',', '.') }}</td>
                        <td class="text-center">{{ $productosCategoria->sum('stock') }}</td>
                    </tr>
                @endforeach
                <!-- Total General -->
                <tr style="background-color: #f8f9fa; font-weight: bold;">
                    <td>TOTAL GENERAL</td>
                    <td class="text-center">{{ $productos->count() }}</td>
                    <td class="text-right">${{ number_format($productos->sum(function($p) { return $p->precio * $p->stock; }), 0, ',', '.') }}</td>
                    <td class="text-center">{{ $productos->sum('stock') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Productos con Stock Bajo -->
    @if($productos->where('stock', '<', 10)->where('stock', '>', 0)->count() > 0)
    <div class="summary">
        <h3>Productos con Stock Bajo (< 10 unidades)</h3>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Stock Actual</th>
                    <th>Precio Venta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos->where('stock', '<', 10)->where('stock', '>', 0) as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                        <td class="text-center">
                            <span class="badge badge-warning">{{ $producto->stock }}</span>
                        </td>
                        <td class="text-right">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Productos sin Stock -->
    @if($productos->where('stock', 0)->count() > 0)
    <div class="summary">
        <h3>Productos sin Stock</h3>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precio Venta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos->where('stock', 0) as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                        <td class="text-right">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if($producto->estado)
                                <span class="badge badge-success">ACTIVO</span>
                            @else
                                <span class="badge badge-secondary">INACTIVO</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div style="margin-top: 30px; text-align: center; font-size: 10px; color: #666;">
        <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} por Sistema CATA</p>
    </div>

</body>
</html>