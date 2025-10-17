@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary mt-2 ms-4" data-bs-toggle="tooltip" title="Volver">
                <i class="fas fa-arrow-left"></i>Cancelar
            </a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center">Editar Cliente</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-warning mt-4">
            <div class="card-header">
                <h1 class="card-title">Formulario de edición</h1>
            </div>

            <div class="card-body">
                <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">

                        
                        <div class="col-md-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $cliente->nombre) }}">
                            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $cliente->apellido) }}">
                            @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $cliente->direccion) }}">
                            @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-4">
                            <label for="fechanacimiento">Fecha Nacimiento</label>
                            <input type="date" id="fechanacimiento" name="fechanacimiento" class="form-control @error('fechanacimiento') is-invalid @enderror" value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}">
                            @error('fechanacimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                       
                        <div class="col-md-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $cliente->telefono) }}">
                            @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-5">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $cliente->email) }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        
                        <div class="col-md-2">
                            <label for="genero">Género</label>
                            <select name="genero" id="genero" class="form-control @error('genero') is-invalid @enderror">
                                <option value="masculino" {{ old('genero', $cliente->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ old('genero', $cliente->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="otro" {{ old('genero', $cliente->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('genero') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>

                  
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-success me-2" data-bs-toggle="tooltip" title="Guardar">
                                <i class="fas fa-save fa-lg"></i>Guardar
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
