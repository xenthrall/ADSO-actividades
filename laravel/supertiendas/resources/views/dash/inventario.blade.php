@extends('adminlte::page')

@section('title', 'kpis de Inventario')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('dash.index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>Volver</a>

        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">KPIs de Inventario</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        {{-- === Tarjetas de resumen === --}}
        <div class="row text-center mb-4">

            {{-- Rotación de inventario --}}
<div class="col-md-4">
    <div class="card bg-info text-white shadow-sm">
        <div class="card-body">
            <h5>Rotación de inventario</h5>
            <h3>
                @if(!is_null($rotacion))
                    {{ number_format($rotacion, 2) }}
                @else
                    <span class="text-muted">Sin datos</span>
                @endif
            </h3>
        </div>
    </div>
</div>
            {{-- Valor total del inventario --}}
            <div class="col-md-4">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h5>Valor total del inventario</h5>
                        <h3>${{ number_format($valorInventario ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>

            {{-- Porcentaje de productos con bajo stock --}}
            <div class="col-md-4">
                <div class="card bg-warning text-white shadow-sm">
                    <div class="card-body">
                        <h5>Productos con stock bajo</h5>
                        <h3>{{ number_format($porcentajeBajo ?? 0, 2) }}%</h3>
                    </div>
                </div>
            </div>

            {{-- Total productos sin stock --}}
            <div class="col-md-4">
                <div class="card bg-danger text-white shadow-sm">
                    <div class="card-body">
                        <h5>Productos sin stock</h5>
                        <h3>{{ $productosSinStock->count() ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- === Tabla: Productos sin stock === --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Productos sin stock</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped text-center m-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productosSinStock as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td><span class="badge bg-danger">Agotado</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted py-3">No hay productos agotados 🎉</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
