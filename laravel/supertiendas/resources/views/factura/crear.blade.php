@extends('adminlte::page')

@section('title', 'crear-factura')

@section('content_header')
<div class="row">
    <div class="col-1">
        <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('factura.index') }}"
            class="btn btn-outline-secondary mt-2 ml-5"><i class="fas fa-arrow-left"></i>Cancelar</a>
    </div>
    <div class="col-10">
        <h1 class="display-6 text-center mt-2">Crear nueva factura</h1>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 mt-3 offset-1">
        <div class="card card-primary mt-3">
            <div class="card-header">
                <h1 class="card-title">Factura</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('factura.store') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        {{-- Cliente --}}
                        <div class="col-md-3">
                            <label for="idcliente" class="form-label">Cliente</label>
                            <select name="idcliente" id="idcliente" class="form-control @error('idcliente') is-invalid @enderror">
                                <option value="">--Selecciona--</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('idcliente') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idcliente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Estado --}}
                        <div class="col-md-3">
                            <label for="idestado" class="form-label">Estado</label>
                            <select name="idestado" id="idestado" class="form-control @error('idestado') is-invalid @enderror">
                                <option value="">--Selecciona--</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}" {{ old('idestado') == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idestado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha --}}
                        <div class="col-md-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="datetime-local" class="form-control @error('fecha') is-invalid @enderror"
                                   id="fecha" name="fecha" value="{{ old('fecha') }}">
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Modo de pago --}}
                        <div class="col-md-3">
                            <label for="idpago" class="form-label">Modo pago</label>
                            <select name="idpago" id="idpago" class="form-control @error('idpago') is-invalid @enderror">
                                <option value="">--Selecciona--</option>
                                @foreach ($modospago as $modo)
                                    <option value="{{ $modo->id }}" {{ old('idpago') == $modo->id ? 'selected' : '' }}>
                                        {{ $modo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpago')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Subtotal --}}
                        <div class="col-md-3">
                            <label for="subtotal" class="form-label">Subtotal</label>
                            <input type="number" step="0.01" class="form-control @error('subtotal') is-invalid @enderror"
                                   id="subtotal" name="subtotal" value="{{ old('subtotal') }}">
                            @error('subtotal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Impuestos --}}
                        <div class="col-md-3">
                            <label for="impuestos" class="form-label">Impuesto</label>
                            <input type="number" step="0.01" class="form-control @error('impuestos') is-invalid @enderror"
                                   id="impuestos" name="impuestos" value="{{ old('impuestos') }}">
                            @error('impuestos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Total --}}
                        <div class="col-md-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" step="0.01" class="form-control @error('total') is-invalid @enderror"
                                   id="total" name="total" value="{{ old('total') }}">
                            @error('total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Botones --}}
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-success mt-3" data-bs-toggle="tooltip" title="Guardar">
                                <i class="fas fa-save fa-lg"></i>Guardar
                            </button>
                            <button type="reset" class="btn btn-outline-info mt-3 ml-2" data-bs-toggle="tooltip" title="Limpiar formulario">
                                <i class="fas fa-trash fa-lg"></i>Limpiar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Alerta de éxito --}}
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
@endsection

@section('js')
    <script>
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
