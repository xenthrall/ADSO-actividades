@extends('layouts.app')
@section('content')

<div class="container mt-5 py-5">
    <div class="row text-center mb-4">
        <div class="col">
            <h2 class="display-5">Gestionar Clientes</h2>
            <p class="lead text-muted">Puedes ediatr o elimnar.</p>
            <button type="submit" class="btn btn-dark"><a href="/clientes/create" style="text-decoration: none; color: white;">un cliente nuevo?</a></button>
        </div>
    </div>
    <div class="row items-center justify-content-center">
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

                    <td>
                        <form action="{{ route('clientes.destroy',$cliente->id_cliente) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>

                    <td>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal{{ $cliente->id_cliente }}">
                            Editar
                        </button>

                        <!-- Modal -->
                        @include('clientes.update')


                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>
@endif

@endsection