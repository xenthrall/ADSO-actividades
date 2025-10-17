@extends('adminlte::page')

@section('title', 'editar-método-de-pago')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('payment.index') }}"
                class="btn btn-outline-secondary mt-2 ml-5"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center mt-2">Editar metodo de pago</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9 offset-1">
        <div class="card card-warning mt-4">
            <div class="card-header">
                <h1 class="card-title">Métodos de pago</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('payment.update', $paymentMethod->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="col-md-5 mt-2">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                               value="{{ old('nombre', $paymentMethod->nombre) }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-7 mt-4">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control"
                               value="{{ old('descripcion', $paymentMethod->descripcion) }}">
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-7 mt-4">
                        <label for="activo" class="form-label">Activo</label>
                        <select name="activo" id="activo" class="form-control">
                            <option value="1" {{ old('activo', $paymentMethod->activo) == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('activo', $paymentMethod->activo) == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('activo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
