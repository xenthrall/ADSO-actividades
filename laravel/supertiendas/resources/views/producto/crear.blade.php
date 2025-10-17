@extends('adminlte::page')

@section('title', 'Crear producto')

@section('content_header')
    <div class="row">
        <div class="col-1">
            <a data-bs-toggle="tooltip" title="Volver-cancelar" href="{{ route('producto.index') }}"
               class="btn btn-outline-secondary mt-2 mb-1 ms-5">
                <i class="fas fa-arrow-left"></i>Cancelar
            </a>
        </div>
        <div class="col-10">
            <h1 class="display-6 text-center">Crear nuevo producto</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-primary mt-2">
                <div class="card-header">
                    <h1 class="card-title">Formulario de registro</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('producto.store') }}" method="post">
                        @csrf
                        <div class="row g-3">

                            {{-- Nombre --}}
                            <div class="col-md-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Descripción --}}
                            <div class="col-md-6">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion"
                                    class="form-control @error('descripcion') is-invalid @enderror"
                                    placeholder="Descripción" value="{{ old('descripcion') }}">
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Precio --}}
                            <div class="col-md-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" name="precio" id="precio" step="0.01"
                                    class="form-control @error('precio') is-invalid @enderror"
                                    placeholder="Precio" value="{{ old('precio') }}">
                                @error('precio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Precio Compra --}}
                            <div class="col-md-4">
                                <label for="preciocompra" class="form-label">Precio Compra</label>
                                <input type="number" name="preciocompra" id="preciocompra" step="0.01"
                                    class="form-control @error('preciocompra') is-invalid @enderror"
                                    placeholder="Precio de compra" value="{{ old('preciocompra') }}">
                                @error('preciocompra')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Stock --}}
                            <div class="col-md-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" id="stock"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    placeholder="Stock" value="{{ old('stock') }}">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Categoría --}}
                            <div class="col-md-5">
                                <label for="idcategoria" class="form-label">Categoría</label>
                                <select name="idcategoria" id="idcategoria" class="form-control @error('idcategoria') is-invalid @enderror">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ old('idcategoria') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idcategoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Marca --}}
                            <div class="col-md-3">
                                <label for="idmarca" class="form-label">Marca</label>
                                <select name="idmarca" id="idmarca" class="form-control @error('idmarca') is-invalid @enderror">
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}" {{ old('idmarca') == $marca->id ? 'selected' : '' }}>
                                            {{ $marca->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idmarca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Estado --}}
                            <div class="col-md-2">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                                    <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Botones --}}
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-outline-success me-2" data-bs-toggle="tooltip" title="Guardar">
                                    <i class="fas fa-save fa-lg"></i>Guardar
                                </button>
                                <button type="reset" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Limpiar formulario">
                                    Limpiar
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
