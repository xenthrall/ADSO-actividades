@extends('adminlte::page')

@section('title', 'kpis de ventas')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{route('dash.index')}}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>Volver</a>

        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">KPIs de VENTAS</h1>
        </div>
    </div>
@endsection

@section('content')

<div class="container-fluid">

        {{-- === KPIs numéricos === --}}
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h5>Ventas del mes</h5>
                        <h3>${{ number_format($ventasMes, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h5>Tasa de crecimiento</h5>
                        <h3>
                            @if($tasaCrecimiento !== null)
                                {{ number_format($tasaCrecimiento, 2) }}%
                            @else
                                <span class="text-muted">Sin datos previos</span>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning text-white shadow-sm">
                    <div class="card-body">
                        <h5>Ticket promedio</h5>
                        <h3>${{ number_format($ticketPromedio, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- === Ventas por categoría === --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Ventas por categoría</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Ventas ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventasCategoria as $cat)
                            <tr>
                                <td>{{ $cat->nombre }}</td>
                                <td>${{ number_format($cat->ventas, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- === Top productos === --}}
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Top productos más vendidos</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Cantidad vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topProductos as $index => $prod)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td>{{ $prod->total_vendidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
@endsection