@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left"></i>Volver</a>
            <a data-bs-toggle="tooltip" title="Nuevo Producto" href="{{ route('producto.create') }}"
                class="btn btn-outline-primary mt-1 ml-2"><i class="fas fa-plus"></i>Nuevo</a>
        </div>
        <div class="col-8">
            <h1 class="display-5 text-center">Gestion de Producto</h1>
        </div>
    </div>

@endsection

@section('content')
    <!-- Card de Filtros -->
    <div class="card card-secondary">
        <div class="card-header">
            <h5 class="card-title"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('producto.index') }}">
                <div class="row">
                    <!-- Búsqueda general -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Buscar</label>
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Nombre o descripción...">
                        </div>
                    </div>

                    <!-- Filtro por categoría -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="categoria_id">Categoría</label>
                            <select class="form-control" id="categoria_id" name="categoria_id">
                                <option value="">Todas</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por marca -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="marca_id">Marca</label>
                            <select class="form-control" id="marca_id" name="marca_id">
                                <option value="">Todas</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}"
                                        {{ request('marca_id') == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por estado -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="">Todos</option>
                                <option value="1" {{ request('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ request('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <!-- Botones -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mostrar filtros aplicados -->
                @if (request()->hasAny(['search', 'categoria_id', 'marca_id', 'estado']))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-dismissible fade show mb-0 mt-2" role="alert">
                                <strong>Filtros aplicados:</strong>
                                @if (request('search'))
                                    <span class="badge badge-light">Búsqueda: "{{ request('search') }}"</span>
                                @endif
                                @if (request('categoria_id'))
                                    <span class="badge badge-light">Categoría:
                                        {{ $categorias->find(request('categoria_id'))->nombre ?? '' }}</span>
                                @endif
                                @if (request('marca_id'))
                                    <span class="badge badge-light">Marca:
                                        {{ $marcas->find(request('marca_id'))->nombre ?? '' }}</span>
                                @endif
                                @if (request('estado') !== null)
                                    <span class="badge badge-light">Estado:
                                        {{ request('estado') ? 'Activo' : 'Inactivo' }}</span>
                                @endif
                                <a href="{{ route('producto.index') }}" class="btn btn-sm btn-outline-secondary ml-2">
                                    <i class="fas fa-times"></i> Limpiar
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card card-primary mt-3">
                <div class="card-header text-center">
                    <h1 class="card-title">Productos</h1>

                    <div>
                        <a href="{{ route('producto.generarpdf') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i>DESCARGAR PDF
                        </a>



                        <a href="{{ route('producto.pdf') }}" class="btn btn-info btn-sm" target="_blank">
                            <i class="fas fa-eye"></i> Ver PDF
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripcion</td>
                                <td>Precio</td>
                                <td>Precio Compra</td>
                                <td>Stock</td>
                                <td>Categoria</td>
                                <td>Marca</td>
                                <td>Fecha creación</td>
                                <td>Estado</td>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->preciocompra }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->marca->nombre }}</td>
                                    <td>{{ $producto->created_at }}</td>
                                    <td>{{ $producto->estado }}</td>
                                    <td>
                                        <a data-bs-toggle="tooltip" title="Editar" class="btn btn-outline-warning"
                                            href="{{ route('producto.edit', $producto->id) }}"><i
                                                class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                        <form action="{{ route('producto.destroy', $producto->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" data-bs-toggle="tooltip" title="Eliminar"
                                                class="btn btn-outline-danger" onclick="confirmarEliminacion(event)"><i
                                                    class="fas fa-trash-alt fa-lg"></i>Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'Aceptar',
                    timer: 3000
                });
            });
        </script>
    @endif
@stop

@section('css')

@stop

@section('js')
    <script>
        function confirmarEliminacion(event) {
            event.preventDefault();
            const form = event.target.closest('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }



        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
                }
            });
        });
    </script>
@endsection
