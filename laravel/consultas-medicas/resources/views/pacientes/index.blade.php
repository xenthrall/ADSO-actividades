<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>listar equipos</title>
</head>

<body class="container mt-4">
    <h1 class="mb-4">Gestión de Pacientes</h1>
    <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">Regresar</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th></th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Género</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th colspan="2" class="text-center">Acciones</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{$paciente -> tipoDocumento}}</td>
                <td>{{$paciente -> dni}}</td>
                <td>{{$paciente -> nombre}} {{$paciente -> apellido}}</td>
                <td>{{$paciente -> fechaNacimiento}}</td>
                <td>{{$paciente -> genero}}</td>
                <td>{{$paciente -> telefono}}</td>
                <td>{{$paciente -> email}}</td>
                <td>{{$paciente -> direccion}}</td>
                <td>{{$paciente -> estado}}</td>

                
            </tr>
            @endforeach
        </tbody>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>