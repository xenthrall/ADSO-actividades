@extends('adminlte::page')

@section('title','Gestión-categorias')

@section('content_header')
<h1 class="display-6">Gestion de categorias</h1>
@stop

@section('content')


<div class="row">
    <div class="col-md-10 offset-1">
        <a data-bs-toggle="tooltip" title="Nuevo" href="{{ route('categoria.create') }}" class="btn btn-primary mt-3"><i class="fas fa-plus"></i>Nueva</a>
        <a data-bs-toggle="tooltip" title="Volver" href="{{ route('index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i>Volver</a>
        <div class="card card-primary mt-4">
            <div class="card-header">
                <h6 class="card-title">Categorias</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="text-center table-primary">
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td>
                                <a data-bs-toggle="tooltip" title="Editar" href="{{ route('categoria.edit',$categoria->id) }}" class="btn btn-outline-warning"><i class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                <form action="{{ route('categoria.destroy',$categoria->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button data-bs-toggle="tooltip" title="Eliminar" type="submit" class="btn btn-outline-danger" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt"></i>Eliminar</button>
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

