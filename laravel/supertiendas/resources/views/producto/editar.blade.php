@extends('adminlte::page')

@section('title', 'editar-producto')

@section('content_header')
<div class="row">
    <div class="col-1">
        <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('producto.index')}}"
class="btn btn-outline-secondary mt-2 mb-1 ml-5"><i class="fas fa-arrow-left"></i>Cancelar</a>
    </div>
    <div class="col-10">
        <h1 class="display-6 text-center">Editar Producto</h1>
    </div>
</div>    

@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-primary mt-2">
                <div class="card-header">
                    <h1 class="card-title">Producto</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('producto.update', $producto->id)}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-1">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control mb-2" value="{{$producto->id}}" disabled>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control mb-2"
                                    value="{{$producto->nombre}}">
                            </div>
                            <div class="col-md-6">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control mb-2"
                                    value="{{$producto->descripcion}}">
                            </div>
                            <div class="col-md-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="decimal" name="precio" id="precio" class="form-control mb-2"
                                    value="{{$producto->precio}}">
                            </div>
                            <div class="col-md-4">
                                <label for="preciocompra" class="form-label">Precio Compra</label>
                                <input type="decimal" name="preciocompra" id="preciocompra" class="form-control mb-2"
                                    value="{{$producto->preciocompra}}">
                            </div>
                            <div class="col-md-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="integer" name="stock" id="stock" class="form-control mb-2"
                                    value="{{$producto->stock}}">
                            </div>
                            <div class="col-md-5">
                                <label for="idcategoria" class="form-label">Categoria</label>
                                <select class="form-control" id="idcategoria" name="idcategoria">
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                @if ($categoria->id == $producto->idcategoria)
                                selected
                                @endif
                                >{{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>
                            </div>
                            <div class="col-md-4">
                                <label for="idmarca" class="form-label">Marca</label>
                                <select class="form-control" id="idmarca" name="idmarca">
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}"
                                @if ($marca->id == $producto->idmarca)
                                selected
                                @endif>{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                            </div>
                            <div class="col-md-2">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-control" id="estado" name="estado">
                            <option value="1" @if ($producto->estado ==1)
                                selected @endif >Activo</option>
                            <option value="0" @if ($producto->estado ==0)
                                selected @endif >Inactivo</option>
                        </select>
                            </div>
                            <div class="col-md-12">
                                <button data-bs-toggle="tooltip" title="Guardar" type="submit"
                                    class="btn btn-outline-success mt-3"><i class="fas fa-save fa-lg"></i>Guardar
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection