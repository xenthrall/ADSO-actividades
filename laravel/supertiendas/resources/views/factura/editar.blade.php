@extends('adminlte::page')

@section('title', 'editar-factura')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('factura.index') }}"
                class="btn btn-outline-secondary mt-2 ml-5"><i class="fas fa-arrow-left"></i>Cancelar</a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center mt-2">Editar factura</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 mt-3 offset-1">
            <div class="card card-warning mt-3">
                <div class="card-header">
                    <h1 class="card-title">Factura</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('factura.update', $factura->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="idcliente" class="form-label">Cliente</label>
                                <select name="idcliente" id="idcliente" class="form-control">
                                    <option value="">--Selecciona--</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('idcliente', $factura->idcliente) == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idcliente')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="idestado" class="form-label">Estado</label>
                                <select name="idestado" id="idestado" class="form-control">
                                    <option value="">--Selecciona--</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" {{ old('idestado', $factura->idestado) == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idestado')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="datetime-local" class="form-control" id="fecha" name="fecha"
                                    value="{{ old('fecha', \Carbon\Carbon::parse($factura->fecha)->format('Y-m-d\TH:i')) }}">
                                @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="idpago" class="form-label">Modo de Pago</label>
                                <select name="idpago" id="idpago" class="form-control">
                                    <option value="">--Selecciona--</option>
                                    @foreach ($modospago as $modo)
                                        <option value="{{ $modo->id }}" {{ old('idpago', $factura->idpago) == $modo->id ? 'selected' : '' }}>
                                            {{ $modo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idpago')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="subtotal" class="form-label">Subtotal</label>
                                <input type="number" step="0.01" class="form-control" id="subtotal" name="subtotal"
                                    value="{{ old('subtotal', $factura->subtotal) }}">
                                @error('subtotal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="impuestos" class="form-label">Impuesto</label>
                                <input type="number" step="0.01" class="form-control" id="impuestos" name="impuestos"
                                    value="{{ old('impuestos', $factura->impuestos) }}">
                                @error('impuestos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="number" step="0.01" class="form-control" id="total" name="total"
                                    value="{{ old('total', $factura->total) }}">
                                @error('total')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-success mt-3"><i class="fas fa-save fa-lg"></i>Guardar</button>
                                <a href="{{ route('factura.index') }}" class="btn btn-outline-warning mt-3 ml-2"><i class="fas fa-times fa-lg"></i></a>
                                <button type="reset" class="btn btn-outline-info mt-3 ml-2">Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
