@extends('adminlte::page')

@section('title','Gestión-métodos de pago')

@section('content_header')
<h1 class="display-6">Gestion de métodos de pago</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <a href="{{ route('index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i>Volver</a>
        <a href="{{ route('payment.create') }}" class="btn btn-primary mt-3"><i class="fas fa-plus"></i>Nuevo</a>

        <div class="card card-primary mt-4">
            <div class="card-header">
                <h6 class="card-title">Metodos de pago</h6>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Activo</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($methods as $method)
                        <tr>
                            <td>{{ $method->id }}</td>
                            <td>{{ $method->nombre }}</td>
                            <td>{{ $method->descripcion }}</td>
                            <td>@if ($method->activo == 1)
                                Activo
                                @else
                                Inactivo
                            @endif</td>
                            <td>
                                <a href="{{ route('payment.edit',$method->id) }}" class="btn btn-outline-warning"><i class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                <form action="{{ route('payment.destroy',$method->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt fa-lg"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
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



    $(document).ready(function() {
        $('#myTable').DataTable({
            // Opciones personalizadas, si las necesitas
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
            }
        });
    });
</script>
@stop

