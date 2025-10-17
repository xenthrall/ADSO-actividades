@extends('adminlte::page')

@section('title', 'KPIs Financieros')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver" href="{{ route('dash.index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2">
                <i class="fas fa-arrow-left fa-lg"></i> Volver
            </a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">KPIs Financieros</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        {{-- === Tarjetas de resumen === --}}
        <div class="row text-center mb-4">
            {{-- Margen de ganancia promedio --}}
            <div class="col-md-3">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h5>Margen de ganancia promedio</h5>
                        <h3>
                            @if (!is_null($margenPromedio))
                                ${{ number_format($margenPromedio, 2, ',', '.') }}
                            @else
                                <span class="text-muted">Sin datos</span>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            {{-- ROI promedio (calculado a partir de categorías) --}}
            <div class="col-md-3">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h5>ROI promedio por categoría</h5>
                        @php
                            $roiPromedio = $roiCategorias->avg('roi_percent') ?? 0;
                        @endphp
                        <h3>{{ number_format($roiPromedio, 2) }}%</h3>
                    </div>
                </div>
            </div>

            {{-- Markup promedio --}}
            <div class="col-md-3">
                <div class="card bg-warning text-white shadow-sm">
                    <div class="card-body">
                        <h5>Eficiencia en precios de compra vs venta</h5>
                        <h3>{{ number_format($markupPromedio ?? 0, 2) }}%</h3>
                    </div>
                </div>
            </div>

            {{-- Costo de inventario vs ventas --}}
            <div class="col-md-3">
                <div class="card bg-danger text-white shadow-sm">
                    <div class="card-body">
                        <h5>Costo de inventario vs ventas</h5>
                        <h3>
                            @if (!is_null($costoInventarioVentas))
                                {{ number_format($costoInventarioVentas, 2) }}%
                            @else
                                <span class="text-muted">Sin datos</span>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- === Tabla de ROI por categoría === --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">ROI por categoría</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped text-center m-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Categoría</th>
                            <th>Ventas ($)</th>
                            <th>Costo ($)</th>
                            <th>ROI (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roiCategorias as $cat)
                            <tr>
                                <td>{{ $cat['categoria'] }}</td>
                                <td>${{ number_format($cat['ventas'], 0, ',', '.') }}</td>
                                <td>${{ number_format($cat['costo'], 0, ',', '.') }}</td>
                                <td>
                                    @if (!is_null($cat['roi_percent']))
                                        {{ number_format($cat['roi_percent'], 2) }}%
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-3">
                                    No hay datos financieros disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
