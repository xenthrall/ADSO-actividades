<!-- Modal -->
<div class="modal fade" id="modal_edit{{ $paciente->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $paciente->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel{{ $paciente->id }}">Actualizar Paciente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
          @csrf
          <div class="row g-3">

            <!-- Tipo Documento -->
            <div class="col-md-6">
              <label for="tipoDocumento" class="form-label">Tipo de Documento *</label>
              <select class="form-control" id="tipoDocumento" name="tipoDocumento" required>
                <option value="">Seleccione...</option>
                <option value="CC" {{ $paciente->tipoDocumento === 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                <option value="TI" {{ $paciente->tipoDocumento === 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                <option value="CE" {{ $paciente->tipoDocumento === 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
              </select>
            </div>

            <!-- Documento -->
            <div class="col-md-6">
              <label for="dni" class="form-label">Documento *</label>
              <input type="text" class="form-control" id="dni" name="dni"
                     value="{{ $paciente->dni }}" required>
            </div>

            <!-- Nombre -->
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre *</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                     value="{{ $paciente->nombre }}" required>
            </div>

            <!-- Apellido -->
            <div class="col-md-6">
              <label for="apellido" class="form-label">Apellido *</label>
              <input type="text" class="form-control" id="apellido" name="apellido"
                     value="{{ $paciente->apellido }}" required>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="col-md-6">
              <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                     value="{{ $paciente->fechaNacimiento }}">
            </div>

            <!-- Género -->
            <div class="col-md-6">
              <label for="genero" class="form-label">Género *</label>
              <select class="form-control" id="genero" name="genero" required>
                <option value="">Seleccione...</option>
                <option value="M" {{ $paciente->genero === 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $paciente->genero === 'F' ? 'selected' : '' }}>Femenino</option>
                <option value="O" {{ $paciente->genero === 'O' ? 'selected' : '' }}>Otro</option>
              </select>
            </div>

            <!-- Teléfono -->
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono"
                     value="{{ $paciente->telefono }}">
            </div>

            <!-- Correo -->
            <div class="col-md-6">
              <label for="email" class="form-label">Correo Electrónico *</label>
              <input type="email" class="form-control" id="email" name="email"
                     value="{{ $paciente->email }}" required>
            </div>

            <!-- Dirección -->
            <div class="col-md-12">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion"
                     value="{{ $paciente->direccion }}">
            </div>

            <!-- Estado -->
            <div class="col-md-6">
              <label for="estado" class="form-label">Estado *</label>
              <select class="form-control" id="estado" name="estado" required>
                <option value="">Seleccione...</option>
                <option value="activo" {{ $paciente->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $paciente->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
              </select>
            </div>

          </div>

          <!-- Botón -->
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-outline-success">Actualizar Paciente</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
