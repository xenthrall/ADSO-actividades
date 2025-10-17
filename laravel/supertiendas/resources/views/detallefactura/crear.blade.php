@extends('adminlte::page')

@section('title', 'Nuevo Detalle')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a href="{{ route('detalle.index') }}" class="btn btn-outline-secondary mt-2 ms-4" data-bs-toggle="tooltip" title="Volver">
                <i class="fas fa-arrow-left"></i>Cancelar
            </a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center mt-2">Crear nuevo detalle de factura</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-primary mt-4">
            <div class="card-header">
                <h1 class="card-title">Formulario de Detalle</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('detalle.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">

                      
                        <div class="col-md-4">
                            <label for="idfactura" class="form-label">Factura</label>
                            <select name="idfactura" id="idfactura" class="form-control @error('idfactura') is-invalid @enderror">
                                <option value="">--Selecciona--</option>
                                @foreach ($facturas as $factura)
                                    <option value="{{ $factura->id }}" {{ old('idfactura') == $factura->id ? 'selected' : '' }}>
                                        {{ $factura->cliente }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idfactura') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                       
                        <div class="col-md-4">
                            <label for="idproducto" class="form-label">Producto</label>
                            <select name="idproducto" id="idproducto" class="form-control @error('idproducto') is-invalid @enderror">
                                <option value="">--Selecciona--</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ old('idproducto') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idproducto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-4">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control @error('cantidad') is-invalid @enderror" placeholder="Cantidad" value="{{ old('cantidad') }}">
                            @error('cantidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-4">
                            <label for="preciounitario" class="form-label">Precio Unitario</label>
                            <input type="number" step="0.01" name="preciounitario" id="preciounitario" class="form-control @error('preciounitario') is-invalid @enderror" placeholder="Precio Unitario" value="{{ old('preciounitario') }}">
                            @error('preciounitario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                       
                        <div class="col-md-4">
                            <label for="totallinea" class="form-label">Total Línea</label>
                            <input type="number" step="0.01" name="totallinea" id="totallinea" class="form-control @error('totallinea') is-invalid @enderror" placeholder="Total línea" value="{{ old('totallinea') }}">
                            @error('totallinea') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-outline-success me-2" data-bs-toggle="tooltip" title="Guardar">
                                <i class="fas fa-save fa-lg"></i>Guardar
                            </button>
                            <button type="reset" class="btn btn-outline-info me-2" data-bs-toggle="tooltip" title="Limpiar">
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
@endsection

@section('css')
@endsection

@section('js')
<script>
</script>
@endsection
