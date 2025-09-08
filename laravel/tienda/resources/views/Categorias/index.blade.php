@extends('layouts.app')

@section('title')
        Admminitrar Categorias
@endsection

@section('titleContent')
        Administrar Categorías
@endsection

@section('content')
        <div class="container">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3"> + Crear Categoría</a>
            <div class="row">
            <table class="table table-bordered table-striped text-center align-middle table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
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