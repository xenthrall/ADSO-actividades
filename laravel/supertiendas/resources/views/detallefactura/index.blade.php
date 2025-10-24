@extends('adminlte::page')

@section('title', 'detalleFactura')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>Volver</a>

            <a data-bs-toggle="tooltip" title="Nuevo detalle" href="{{ route('detalle.create') }}"
                class="btn btn-outline-primary mt-2 mb-1 ml-2"><i class="fas fa-plus fa-lg"></i>Nuevo</a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">Detalle de facturas</h1>
        </div>
    </div>
@endsection

@section('content')
    <!-- Card de Filtros -->
    <div class="card card-secondary mb-4">
        <div class="card-header">
            <h5 class="card-title"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('detalle.index') }}">
                <div class="row">

                    <!-- Búsqueda general -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Buscar</label>
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Nombre de producto...">
                        </div>
                    </div>

                    <!-- Filtro por Rango de Fechas -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                value="{{ $fecha_inicio }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha_fin">Fecha Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                                value="{{ $fecha_fin }}">
                        </div>
                    </div>

                    <!-- Filtro por Producto -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="producto_id">Producto</label>
                            <select class="form-control" id="producto_id" name="producto_id">
                                <option value="">Todos</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}"
                                        {{ $producto_id == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por Rango de Cantidad -->
                    <div class="col-md-3">
                        <label>Cantidad</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="cantidad_min" placeholder="Mín."
                                value="{{ $cantidad_min }}">
                            <input type="number" class="form-control" name="cantidad_max" placeholder="Máx."
                                value="{{ $cantidad_max }}">
                        </div>
                    </div>

                    <!-- Filtro por Total de Línea -->
                    <div class="col-md-3 mt-3">
                        <label>Total de Línea ($)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" name="total_min" placeholder="Mín."
                                value="{{ $total_min }}">
                            <input type="number" step="0.01" class="form-control" name="total_max" placeholder="Máx."
                                value="{{ $total_max }}">
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
                @if (request()->hasAny([
                        'fecha_inicio',
                        'fecha_fin',
                        'producto_id',
                        'cantidad_min',
                        'cantidad_max',
                        'total_min',
                        'total_max',
                    ]))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-dismissible fade show mb-0 mt-2" role="alert">
                                <strong>Filtros aplicados:</strong>
                                @if (request('search'))
                                    <span class="badge badge-light">Búsqueda: "{{ request('search') }}"</span>
                                @endif
                                @if (request('fecha_inicio'))
                                    <span class="badge badge-light">Fecha Inicio: {{ request('fecha_inicio') }}</span>
                                @endif
                                @if (request('fecha_fin'))
                                    <span class="badge badge-light">Fecha Fin: {{ request('fecha_fin') }}</span>
                                @endif
                                @if (request('producto_id'))
                                    <span class="badge badge-light">Producto:
                                        {{ $productos->find(request('producto_id'))->nombre ?? '' }}</span>
                                @endif
                                @if (request('cantidad_min'))
                                    <span class="badge badge-light">Cantidad Mínima: {{ request('cantidad_min') }}</span>
                                @endif
                                @if (request('cantidad_max'))
                                    <span class="badge badge-light">Cantidad Máxima: {{ request('cantidad_max') }}</span>
                                @endif
                                @if (request('total_min'))
                                    <span class="badge badge-light">Total Mínimo: {{ request('total_min') }}</span>
                                @endif
                                @if (request('total_max'))
                                    <span class="badge badge-light">Total Máximo: {{ request('total_max') }}</span>
                                @endif
                                <a href="{{ route('detalle.index') }}" class="btn btn-sm btn-outline-secondary ml-2">
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
        <div class="col-md-12 mt-3">
            <div class="card card-prymary mt-3">
                <div class="card-header text-center">
                    <h1 class="card-title">detalle facturas</h1>
                    <div class="d-flex justify-content-end gap-2">

                        <!-- Descargar PDF -->
                        <a href="{{ route('detalle.generarpdf') }}"
                            class="btn btn-outline-danger btn-sm d-flex align-items-center">
                            <i class="fas fa-file-pdf me-2"></i> Descargar PDF
                        </a>

                        <!-- Ver PDF -->
                        <a href="{{ route('detalle.pdf') }}"
                            class="btn btn-outline-info btn-sm d-flex align-items-center" target="_blank">
                            <i class="fas fa-eye me-2"></i> Ver PDF
                        </a>
                        @include('charts.datallefacturaschart')

                        <!-- Botón de Gráficas -->
                        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-chart-bar me-2"></i> Ver Gráficas
                        </button>

                    </div>




                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>ID Detalle</th>
                                <th>Factura ID</th>
                                <th>Fecha Factura</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unit.</th>
                                <th>Total Línea</th>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($detallesFactura as $detalle)
                                <tr>
                                    <td>{{ $detalle->id }}</td>
                                    <td>{{ $detalle->idfactura }}</td>
                                    <td>{{ $detalle->factura->fecha }}</td>
                                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>${{ number_format($detalle->preciounitario, 2) }}</td>
                                    <td>${{ number_format($detalle->totallinea, 2) }}</td>
                                    <td>
                                        <a data-bs-toggle="tooltip" title="Editar"
                                            href="{{ route('detalle.edit', $detalle->id) }}"
                                            class="btn btn-outline-warning"><i
                                                class="fas fa-pencil-alt fa-lg"></i>Editar</a>
                                        <form action="{{ route('detalle.destroy', $detalle->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            <button data-bs-toggle="tooltip" title="Eliminar" type="submit"
                                                class="btn btn-outline-danger"><i
                                                    class="fas fa-trash-alt fa-lg"></i>Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No se encontraron registros con los filtros
                                        aplicados.</td>
                                </tr>
                            @endforelse
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
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
