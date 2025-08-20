@extends('layouts.app')

@section('content')
<div class="card mx-auto mt-4" style="max-width: 50rem;">
  <div class="card-body">
    <h5 class="card-title mb-4">Añadir un nuevo Cliente</h5>

    <form action="{{ route('clientes.store') }}" method="POST">
      @csrf

      <div class="row g-3">
        <!-- Nombre -->
        <div class="col-md-6">
          <label for="nombre" class="form-label">Nombre *</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <!-- Apellido -->
        <div class="col-md-6">
          <label for="apellido" class="form-label">Apellido *</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>

        <!-- Dirección -->
        <div class="col-md-12">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion">
        </div>

        <!-- Fecha de nacimiento -->
        <div class="col-md-6">
          <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento *</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>

        <!-- Teléfono -->
        <div class="col-md-6">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono">
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <label for="email" class="form-label">Correo Electrónico *</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Fecha de registro -->
        <div class="col-md-6">
          <label for="fecha_registro" class="form-label">Fecha de Registro</label>
          <input type="date" class="form-control" id="fecha_registro" name="fecha_registro">
        </div>

        <!-- Género -->
        <div class="col-md-6">
          <label for="genero" class="form-label">Género *</label>
          <select class="form-control" id="genero" name="genero" required>
            <option value="">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otros">Otros</option>
          </select>
        </div>
      </div>

      <!-- Botón -->
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-dark">Guardar Cliente</button>
      </div>
    </form>
  </div>
   
</div>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>
@endif

@endsection