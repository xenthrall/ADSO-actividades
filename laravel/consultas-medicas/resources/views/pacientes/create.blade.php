<!-- Modal Crear Paciente -->
<div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCreateLabel">Registrar nuevo paciente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="modal-body row g-3">
          
          <!-- Tipo Documento -->
          <div class="col-md-6">
            <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
            <select name="tipoDocumento" class="form-control" >
              <option value="">Seleccione...</option>
              <option value="CC">Cédula de Ciudadanía</option>
              <option value="TI">Tarjeta de Identidad</option>
              <option value="CE">Cédula de Extranjería</option>
              <option value="PAS">Pasaporte</option>
            </select>
          </div>

          <!-- Documento -->
          <div class="col-md-6">
            <label for="dni" class="form-label">Número de Documento</label>
            <input type="text" class="form-control" name="dni" >
          </div>

          <!-- Nombre -->
          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" >
          </div>

          <!-- Apellido -->
          <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" >
          </div>

          <!-- Fecha Nacimiento -->
          <div class="col-md-6">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechaNacimiento" >
          </div>

          <!-- Género -->
          <div class="col-md-6">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" class="form-control" >
              <option value="">Seleccione...</option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
              <option value="O">Otro</option>
            </select>
          </div>

          <!-- Teléfono -->
          <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono">
          </div>

          <!-- Email -->
          <div class="col-md-6">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email">
          </div>

          <!-- Dirección -->
          <div class="col-12">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion">
          </div>

          <!-- Estado -->
          <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
