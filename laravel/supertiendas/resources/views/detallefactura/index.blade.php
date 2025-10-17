@extends('adminlte::page')

@section('title', 'destalleFactura')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('index')}}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>Volver</a>

            <a data-bs-toggle="tooltip" title="Nuevo detalle" href="{{route('detalle.create')}}"
                class="btn btn-outline-primary mt-2 mb-1 ml-2"><i class="fas fa-plus fa-lg"></i>Nuevo</a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">Detalle de facturas</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-prymary mt-3">
            <div class="card-header">
                <h1 class="card-title">detalle facturas</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Factura</td>
                            <td>Producto</td>
                            <td>Cantidad</td>
                            <td>precio unitario</td>
                            <td>Total linea</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallefacturas as $detalle)
                            <tr>
                                <td>{{$detalle->factura->cliente->nombre}}</td>
                                <td>{{$detalle->producto->nombre}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{$detalle->preciounitario}}</td>
                                <td>{{$detalle->totallinea}}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" title="Editar" href="{{route('detalle.edit', $detalle->id)}}"
                                        class="btn btn-outline-warning"><i class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                    <form action="{{route('detalle.destroy',$detalle->id)}}" method="post" class="d-inline">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Eliminar" type="submit"
                                            class="btn btn-outline-danger"><i class="fas fa-trash-alt fa-lg"></i>Eliminar</button>
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