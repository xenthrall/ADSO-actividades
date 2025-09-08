@extends('layouts.app')

@section('title')
        Crear Marca
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header bg-success text-white text-center fs-3">Crear Nueva Marca</div>
                    <div class="card-body">
                        <form action="{{ route('marcas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection