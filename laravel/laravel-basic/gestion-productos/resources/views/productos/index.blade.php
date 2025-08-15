<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
-->
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        button { cursor: pointer; padding: 8px 12px; background-color: red; color: white; border: solid white 2px; border-radius: 4px; }
        button:hover { background-color: white; color: red; border: solid red 2px; transition: 0.5s;}
        .success-message { padding: 15px; background-color: white; color: red; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;}
    </style>
</head>

<body>
    <h1>Productos</h1>

    <table border="2" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Venta</th>
                <th>Precio Compra</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->precio_compra }}</td>
                <td>{{ $producto->stock }}</td>

                <!-- Buttons delete -->
                <td>
                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>