@extends('layouts.app')

@section('title')
Crear Producto
@endsection



@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-5">
                <div class="card-header bg-primary text-white text-center fs-3">Crear Nuevo Producto</div>
                <div class="card-body">
                    <form action="{{ route('productos.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" >
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>
                        <div class="col-md-6">
                            <label for="idCategoria" class="form-label">Categoria</label>
                            <select name="idCategoria" id="idCategoria" class="form-select">
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="idMarca" class="form-label">Marca</label>
                            <select name="idMarca" id="idMarca" class="form-select">
                                @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-select">
                                <option value="Activo">Activo</option>
                                <option value="InActivo">InActivo</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection