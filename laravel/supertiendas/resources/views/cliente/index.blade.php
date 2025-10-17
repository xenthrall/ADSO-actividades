@extends('adminlte::page')

@section('title', 'Gestion-lientes')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('index')}}"
                class="btn btn-outline-secondary mt-2 ml-2"><i class="fas fa-arrow-left"></i>Volver</a>
            <a data-bs-toggle="tooltip" title="Nuevo Cliente" class="btn btn-outline-primary mt-2 ml-2 text-center"
                href="{{route('cliente.create')}}"><i class="fas fa-plus fa-lg"></i>Nuevo</a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">Gestion de clientes</h1>
        </div>
    </div>


@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-success mt-4">
            <div class="card-header">
                <h6 class="card-title">Clientes</h6>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Dirección</td>
                            <td>Fecha de nacimiento</td>
                            <td>telefono</td>
                            <td>email</td>
                            <td>genero</td>
                            <td>Fecha de registro</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->fechanacimiento}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->genero}}</td>
                                <td>{{$cliente->created_at}}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" title="Editar" class="btn btn-outline-warning"
                                        href="{{route('cliente.edit', $cliente->id)}}"><i
                                            class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                    <form class="d-inline" action="{{route('cliente.destroy', $cliente->id)}}"
                                        method="post">
                                        @csrf
                                        <button type="submit" data-bs-toggle="tooltip" title="Eliminar"
                                            class="btn btn-outline-danger" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt  fa-lg"></i>Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session("success") }}',
                confirmButtonText: 'Aceptar',
                timer: 3000
            });
        });
    </script>
@endif
@stop

@section('css')

@stop

@section('js')
    <script>
        function confirmarEliminacion(event) {
            event.preventDefault();
            const form = event.target.closest('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }



        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
                }
            });
        });
    </script>




@endsection
