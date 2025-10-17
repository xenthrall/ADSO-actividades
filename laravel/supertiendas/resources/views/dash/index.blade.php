@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-2">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('index') }}"
                class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>Volver</a>

        </div>
        <div class="col-8">
            <h1 class="display-6 text-center">Monitorear los Key Performance Indicators</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="d-flex flex-column align-items-center mt-4">
    @foreach ($kpis_requeridos as $nombre => $ruta)
        <a href="{{ route($ruta) }}" 
           class="btn btn-primary mb-3 w-50 text-center shadow-sm">
            Ver KPIs de {{ $nombre }}
        </a>
    @endforeach
</div>

@endsection
