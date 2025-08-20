<!-- Modal -->
<div class="modal fade" id="modal{{ $cliente->id_cliente }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
          @csrf
    

          <div class="row g-3">
            <!-- Nombre -->
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre *</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                     value="{{ old('nombre', $cliente->nombre) }}" required>
            </div>

            <!-- Apellido -->
            <div class="col-md-6">
              <label for="apellido" class="form-label">Apellido *</label>
              <input type="text" class="form-control" id="apellido" name="apellido"
                     value="{{ old('apellido', $cliente->apellido) }}" required>
            </div>

            <!-- Dirección -->
            <div class="col-md-6">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion"
                     value="{{ old('direccion', $cliente->direccion) }}">
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="col-md-6">
              <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                     value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}">
            </div>

            <!-- Teléfono -->
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono"
                     value="{{ old('telefono', $cliente->telefono) }}">
            </div>

            <!-- Correo -->
            <div class="col-md-6">
              <label for="email" class="form-label">Correo Electrónico *</label>
              <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email', $cliente->email) }}" required>
            </div>

            <!-- Fecha de Registro -->
            <div class="col-md-6">
              <label for="fecha_registro" class="form-label">Fecha de Registro</label>
              <input type="date" class="form-control" id="fecha_registro" name="fecha_registro"
                     value="{{ old('fecha_registro', $cliente->fecha_registro) }}">
            </div>

            <!-- Género -->
            <div class="col-md-6">
              <label for="genero" class="form-label">Género *</label>
              <select class="form-control" id="genero" name="genero" required>
                <option value="">Seleccione...</option>
                <option value="Masculino" {{ old('genero', $cliente->genero) === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero', $cliente->genero) === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otros" {{ old('genero', $cliente->genero) === 'Otros' ? 'selected' : '' }}>Otros</option>
              </select>
            </div>
          </div>

          <!-- Botón -->
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-secondary">Actualizar Cliente</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
