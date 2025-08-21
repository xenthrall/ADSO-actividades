<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>listar equipos</title>
</head>

<body>
    <a href="{{route('equipos.create')}}" class="btn btn-primary">Crear Nuevo Equipo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Fundacion</th>
                <th>Liga</th>
                <th>Acciones</th>
                <th></th>
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
                <td>
                    <a href="" class="btn btn-success">Editar</a>
                </td>
                <td>
                    <form action="">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>