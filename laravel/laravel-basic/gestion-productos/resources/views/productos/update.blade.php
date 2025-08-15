<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Productos</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        input[type="text"], input[type="number"] { width: 95%; padding: 5px; }
        button { cursor: pointer; padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; }
        button:hover { background-color: #0056b3; }
        .success-message { padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;}
    </style>
</head>

<body>
    <h1>Actualizar Productos</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table border="2" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Venta</th>
                <th>Precio Compra</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf <tr>
                    <td>{{ $producto->id }}</td>
                    
                    <td><input type="text" name="nombre" value="{{ $producto->nombre }}"></td>
                    <td><input type="text" name="descripcion" value="{{ $producto->descripcion }}"></td>
                    <td><input type="number" step="0.01" name="precio" value="{{ $producto->precio }}"></td>
                    <td><input type="number" step="0.01" name="precio_compra" value="{{ $producto->precio_compra }}"></td>
                    <td><input type="number" name="stock" value="{{ $producto->stock }}"></td>

                    <td>
                        <button type="submit">Actualizar</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</body>
</html>