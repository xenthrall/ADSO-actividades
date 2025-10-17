@extends('adminlte::page')

@section('title', 'Editar marca')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a href="{{ route('marca.index') }}" class="btn btn-outline-secondary mt-2 ms-4" data-bs-toggle="tooltip" title="Volver">
                <i class="fas fa-arrow-left"></i>Cancelar
            </a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center">Editar marca</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-warning mt-3">
            <div class="card-header">
                <h1 class="card-title">Formulario de edición</h1>
            </div>

            <div class="card-body">
                <form action="{{ route('marca.update', $marca->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-2">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" id="id" name="id" class="form-control" value="{{ $marca->id }}" disabled>
                        </div>

                        <div class="col-md-5">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre', $marca->nombre) }}"
                            >
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input
                                type="text"
                                id="descripcion"
                                name="descripcion"
                                class="form-control @error('descripcion') is-invalid @enderror"
                                value="{{ old('descripcion', $marca->descripcion) }}"
                            >
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-outline-success me-2" data-bs-toggle="tooltip" title="Guardar">
                                <i class="fas fa-save fa-lg"></i>Guardar
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
