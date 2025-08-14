<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex vh-100 justify-content-center align-items-center">


    <form method="POST" action="{{ route('productos.store')}}" class="container d-flex flex-column col-md-4 gap-4 bg-light p-4 rounded shadow sm">
        @csrf
        <h3 class="text-center"> Crear un nuevo producto</h3>

        <div>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre producto">
        </div>

        <div class="d-flex gap-2">

            <div>
                <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio">
            </div>

            <div>
                <input type="number" name="precio_compra" id="precio_compra" class="form-control" placeholder="Precio Compra">
            </div>

            <div>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
            </div>
        </div>

        <div>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descripción"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>

    </form>
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>

        @endif


</body>

</html>