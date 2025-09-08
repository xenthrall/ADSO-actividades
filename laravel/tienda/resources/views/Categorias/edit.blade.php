@extends('layouts.app')

@section('title')
        Actualizar Categoría
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header bg-warning text-white text-center fs-3">Actualizar Categoría</div>
                    <div class="card-body">
                        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $categoria->descripcion }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Actualizar</button>
                                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection