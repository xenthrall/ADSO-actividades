@extends('adminlte::page')

@section('title', 'Gestión_facturas')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('index')}}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left"></i>Volver</a>
            <a data-bs-toggle="tooltip" title="Nueva factura" href="{{route('factura.create')}}"
                class="btn btn-outline-primary mt-1 ml-2"><i class="fas fa-plus"></i>Nueva</a>
        </div>
        <div class="col-8">
            <h1 class="display-5 text-center">Gestion de facturas</h1>
        </div>
    </div>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary mt-4" >
            <div class="card-header">
                <h6 class="card-title">Facturas</h6>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Cliente</td>
                            <td>Estado</td>
                            <td>Fecha</td>
                            <td>Modo de pago</td>
                            <td>Subtotal</td>
                            <td>Impuestos</td>
                            <td>Total</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                            <tr>
                                <td>{{$factura->id}}</td>
                                <td>{{$factura->cliente->nombre}}</td>
                                <td>{{$factura->estado->descripcion}}</td>
                                <td>{{$factura->fecha}}</td>
                                <td>{{$factura->paymentMethod->nombre}}</td>
                                <td>{{$factura->subtotal}}</td>
                                <td>{{$factura->impuestos}}</td>
                                <td>{{$factura->total}}</td>
                                <td>
                                    <a href="{{route('factura.edit',$factura->id)}}" data-bs-toggle="tooltip" title="Editar" class="btn btn-outline-warning mt-2"><i class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                    <form action="{{route('factura.destroy',$factura->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Eliminar" type="submit" class="btn btn-outline-danger mt-2" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt fa-lg"></i>Eliminar</button>
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
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar',
                timer: 3000
            });
        });
    </script>
@endif

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
    </script>
    
  
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
     <script>
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
