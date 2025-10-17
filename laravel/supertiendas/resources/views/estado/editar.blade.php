@extends('adminlte::page')

@section('title', 'editar-estado')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver / Cancelar" href="{{ route('estado.index') }}"
                class="btn btn-outline-secondary mt-2 ml-2">
                <i class="fas fa-arrow-left fa-lg"></i>Cancelar
            </a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center mt-2">Editar estado</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-warning mt-4">
                <div class="card-header">
                    <h1 class="card-title">Estado</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('estado.update', $estado->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-7">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion"
                                    class="form-control @error('descripcion') is-invalid @enderror"
                                    placeholder="Descripción"
                                    value="{{ old('descripcion', $estado->descripcion) }}">

                                @error('descripcion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <button data-bs-toggle="tooltip" title="Guardar" type="submit"
                                    class="btn btn-outline-success">
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
