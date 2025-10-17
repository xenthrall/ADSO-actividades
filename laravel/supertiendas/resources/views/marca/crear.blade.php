@extends('adminlte::page')

@section('title', 'Crear marca')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a href="{{ route('marca.index') }}" class="btn btn-outline-secondary mt-2 ms-4" data-bs-toggle="tooltip" title="Cancelar-Volver">
                <i class="fas fa-arrow-left"></i>Cancelar
            </a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center">Crear nueva marca</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-success mt-3">
            <div class="card-header">
                <h1 class="card-title">Formulario de registro</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('marca.store') }}" method="post">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                placeholder="Nombre"
                                value="{{ old('nombre') }}"
                            >
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-7">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input
                                type="text"
                                id="descripcion"
                                name="descripcion"
                                class="form-control @error('descripcion') is-invalid @enderror"
                                placeholder="Descripción"
                                value="{{ old('descripcion') }}"
                            >
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-outline-success me-2" data-bs-toggle="tooltip" title="Guardar">
                                <i class="fas fa-save fa-lg"></i>Guardar
                            </button>
                            <button type="reset" class="btn btn-outline-info me-2" data-bs-toggle="tooltip" title="Limpiar formulario">
                                Limpiar
                            </button>
                        </div>
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
