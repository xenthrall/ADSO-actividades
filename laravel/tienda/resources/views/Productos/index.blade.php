@extends('layouts.app')

@section('title')
        Admminitrar Marcas
@endsection

@section('titleContent')
        Administrar Marcas
@endsection

@section('content')
        <div class="container">
            <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3"> + Crear Marca</a>
            <div class="row">
            <table class="table table-bordered table-striped text-center align-middle table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Fecha de Creación</th>
                        <th>Estado</th>                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->marca->nombre }}</td>
                        <td>{{ $producto->fecha_creacion }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>
                            <a href="{{ route('productos.edit',$producto->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
            </div>
            <div class="col-12 text-center my-3">
                <a href="{{ Route('welcome') }}" class="btn btn-secondary text-center">volver</a>
            </div>            
        </div>
@endsection