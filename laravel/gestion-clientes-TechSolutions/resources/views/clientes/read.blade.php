@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Dirección</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Fecha de Registro</th>
            <th scope="col">Género</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($clientes as $cliente)
            <th scope="row">{{ $cliente->id_cliente }}</th>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>{{ $cliente->fecha_nacimiento }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->fecha_registro }}</td>
            <td>{{ $cliente->genero }}</td>
            <td><button type="button" class="btn btn-dark">Dark</button></td>
            
        </tr>
        @endforeach

    </tbody>
</table>

@endsection