@extends('adminlte::page')

@section('title', 'crear-método-de-pago')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('payment.index') }}"
                class="btn btn-outline-secondary mt-2 ml-5"><i class="fas fa-arrow-left"></i></a>Cancelar
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center mt-2">Crear metodo de pago</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9 offset-1">
        <div class="card card-success mt-4">
            <div class="card-header">
                <h1 class="card-title">Métodos de pago</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('payment.store') }}" method="post">
                    @csrf

                    <div class="col-md-5 mt-2">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                               placeholder="Nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-7 mt-4">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control"
                               placeholder="Descripción" value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-7 mt-4">
                        <label for="activo" class="form-label">Activo</label>
                        <select name="activo" id="activo" class="form-control">
                            <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('activo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mt-2">
                        <button data-bs-toggle="tooltip" title="Guardar" type="submit"
                        class="btn btn-outline-success mt-3"><i class="fas fa-save"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
