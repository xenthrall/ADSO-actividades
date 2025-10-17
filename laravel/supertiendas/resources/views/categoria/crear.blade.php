@extends('adminlte::page')

@section('title', 'Crear categoría')

@section('content_header')
    <h1 class="display-5">Crear nueva categoría</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        {{-- Botón volver arriba --}}
        <a data-bs-toggle="tooltip" title="Volver" href="{{ route('categoria.index') }}" class="btn btn-outline-secondary mt-3">
            <i class="fas fa-arrow-left"></i>Cancelar
        </a>

        <div class="card card-success mt-4">
            <div class="card-header">
                <h1 class="card-title">Formulario de registro</h1>
            </div>

            <div class="card-body">
                <form action="{{ route('categoria.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mt-2">
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
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-2">
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
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button data-bs-toggle="tooltip" title="Guardar" type="submit" class="btn btn-outline-success me-2">
                                <i class="fas fa-save"></i>Guardar
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
