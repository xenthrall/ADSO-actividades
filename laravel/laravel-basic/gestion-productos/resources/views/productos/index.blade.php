<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
-->

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

                <!-- Buttons delete and edit-->
                <td>
                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                        @csrf
                        <button type="submit" style="cursor: pointer; color:red;">Eliminar</button>
                    </form>
                </td>
                <td>
                    <button style="cursor: pointer;">Update</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>