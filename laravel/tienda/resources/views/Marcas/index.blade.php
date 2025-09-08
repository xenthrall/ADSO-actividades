@extends('layouts.app')

@section('title')
        Admminitrar Marcas
@endsection

@section('titleContent')
        Administrar Marcas
@endsection

@section('content')
        <div class="container">
            <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3"> + Crear Marca</a>
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
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nombre }}</td>
                        <td>{{ $marca->descripcion }}</td>
                        <td>
                            <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display:inline-block;">
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