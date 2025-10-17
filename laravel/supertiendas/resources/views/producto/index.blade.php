@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('index')}}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left"></i>Volver</a>
            <a data-bs-toggle="tooltip" title="Nuevo Producto" href="{{route('producto.create')}}"
                class="btn btn-outline-primary mt-1 ml-2"><i class="fas fa-plus"></i>Nuevo</a>
        </div>
        <div class="col-8">
            <h1 class="display-5 text-center">Gestion de Producto</h1>
        </div>
    </div>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-2">
        <div class="card card-primary mt-3">
            <div class="card-header text-center">
                <h1 class="card-title">Productos</h1>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Precio</td>
                            <td>Precio Compra</td>
                            <td>Stock</td>
                            <td>Categoria</td>
                            <td>Marca</td>
                            <td>Fecha creación</td>
                            <td>Estado</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->preciocompra}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>{{$producto->categoria->nombre}}</td>
                                <td>{{$producto->marca->nombre}}</td>
                                <td>{{$producto->created_at}}</td>
                                <td>{{$producto->estado}}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" title="Editar" class="btn btn-outline-warning"
                                        href="{{route('producto.edit', $producto->id)}}"><i
                                            class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                    <form action="{{route('producto.destroy', $producto->id)}}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" data-bs-toggle="tooltip" title="Eliminar"
                                            class="btn btn-outline-danger" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt fa-lg"></i>Eliminar</button> 
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