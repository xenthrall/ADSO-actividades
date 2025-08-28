<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Panel Consultas Médicas</title>
</head>

<body class="container mt-4">
    <h1 class="mb-4">Gestión de Consultas Médicas</h1>
    <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">Regresar</a>

    <!-- Botón para abrir modal de crear consulta -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modal_create">
        <i class="bi bi-plus-circle"></i> Nueva Consulta
    </button>

    <!-- Modal crear consulta -->
    @include('consultas_medicas.create')

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Tipo Consulta</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Diagnóstico</th>
                <th>Estado Pago</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta->id }}</td>
                <td>{{ $consulta->paciente->nombre }} {{ $consulta->paciente->apellido }}</td>
                <td>{{ $consulta->tipo_consulta }}</td>
                <td>{{ $consulta->fecha_consulta }}</td>
                <td>{{ $consulta->motivo }}</td>
                <td>{{ $consulta->diagnostico }}</td>
                <td>
                    <span class="badge 
                        @if($consulta->estado_pago == 'pendiente') bg-warning 
                        @elseif($consulta->estado_pago == 'pagado') bg-success 
                        @else bg-info @endif">
                        {{ ucfirst($consulta->estado_pago) }}
                    </span>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_edit{{ $consulta->id }}">
                        Editar
                    </button>

                    <!-- Modal editar consulta -->
                    @include('consultas_medicas.edit')
                </td>
                <td>
                    <form action="{{ route('consultas_medicas.destroy', $consulta->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta consulta?')">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
