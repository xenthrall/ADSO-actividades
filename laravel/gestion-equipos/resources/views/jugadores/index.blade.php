<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Listar Jugadores</title>
</head>

<body class="container mt-4">

    <h1 class="mb-4">Gestión de Jugadores</h1>

    <a href="{{ route('jugadores.create') }}" class="btn btn-primary mb-3">Crear Nuevo Jugador</a>
    <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">Regresar</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Posición</th>
                <th>Número</th>
                <th>Fecha Nacimiento</th>
                <th>Nacionalidad</th>
                <th>Equipo</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $jugador)
            <tr>
                <td>{{ $jugador->id }}</td>
                <td>{{ $jugador->nombre }}</td>
                <td>{{ $jugador->apellido }}</td>
                <td>{{ $jugador->posicion }}</td>
                <td>{{ $jugador->numero }}</td>
                <td>{{ $jugador->fecha_nacimiento }}</td>
                <td>{{ $jugador->nacionalidad }}</td>
                <td>{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</td>
                <td>
                    <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn btn-success btn-sm">Editar</a>
                </td>
                <td>
                    <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este jugador?')">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>