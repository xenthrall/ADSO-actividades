<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>listar equipos</title>
</head>

<body class="container mt-4">
    <h1 class="mb-4">Gestión de Equipos</h1>
    <a href="{{route('equipos.create')}}" class="btn btn-primary mb-3">Crear Nuevo Equipo</a>
    <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">Regresar</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Fundacion</th>
                <th>Liga</th>
                <th colspan="2" class="text-center">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr>
                <td>{{$equipo -> id}}</td>
                <td>{{$equipo -> nombre}}</td>
                <td>{{$equipo -> ciudad}}</td>
                <td>{{$equipo -> pais}}</td>
                <td>{{$equipo -> fundacion}}</td>
                <td>{{$equipo -> liga}}</td>

                <td class="text-center">
                    <form action="{{route('equipos.destroy', $equipo->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                <td class="text-center">
                    <a href="{{route('equipos.edit', $equipo->id)}}" class="btn btn-success">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>