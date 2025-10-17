@extends('adminlte::page')

@section('title', 'KPIs de Clientes')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver" href="{{ route('dash.index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2">
                <i class="fas fa-arrow-left fa-lg"></i> Volver
            </a>
        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">KPIs de Clientes</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        {{-- === Tarjetas de resumen === --}}
        <div class="row text-center mb-4">
            {{-- Clientes nuevos --}}
            <div class="col-md-4">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h5>Clientes nuevos del mes</h5>
                        <h3>{{ $clientesNuevos ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            {{-- Tasa de retención --}}
            <div class="col-md-4">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h5>Tasa de retención</h5>
                        <h3>
                            @if(!is_null($tasaRetencion))
                                {{ number_format($tasaRetencion, 2) }}%
                            @else
                                <span class="text-muted">Sin datos</span>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            {{-- Valor promedio por cliente --}}
            <div class="col-md-4">
                <div class="card bg-warning text-white shadow-sm">
                    <div class="card-body">
                        <h5>Valor promedio por cliente</h5>
                        <h3>${{ number_format($valorPromCliente ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- === Distribución por género === --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Distribución de clientes por género</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped text-center m-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Género</th>
                            <th>Total de clientes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($distribGenero as $gen)
                            <tr>
                                <td>{{ ucfirst($gen->genero) }}</td>
                                <td>{{ $gen->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-muted py-3">No hay datos de clientes.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
