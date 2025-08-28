<!-- Modal Crear Consulta Médica -->
<div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCreateLabel">Registrar nueva consulta médica</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="{{ route('consultas_medicas.store') }}" method="POST">
        @csrf
        <div class="modal-body row g-3">

          <!-- Paciente -->
          <div class="col-md-6">
            <label for="id_paciente" class="form-label">Paciente</label>
            <select name="id_paciente" class="form-control" required>
              <option value="">Seleccione...</option>
              @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
              @endforeach
            </select>
          </div>

          <!-- Tipo Consulta -->
          <div class="col-md-6">
            <label for="tipo_consulta" class="form-label">Tipo de Consulta</label>
            <select name="tipo_consulta" class="form-control" required>
              <option value="">Seleccione...</option>
              <option value="primera vez">Primera vez</option>
              <option value="control">Control</option>
              <option value="urgencia">Urgencia</option>
              <option value="seguimiento">Seguimiento</option>
            </select>
          </div>

          <!-- Fecha Consulta -->
          <div class="col-md-6">
            <label for="fecha_consulta" class="form-label">Fecha de Consulta</label>
            <input type="date" class="form-control" name="fecha_consulta" required>
          </div>

          <!-- Motivo -->
          <div class="col-md-6">
            <label for="motivo" class="form-label">Motivo</label>
            <input type="text" class="form-control" name="motivo" required>
          </div>

          <!-- Diagnóstico -->
          <div class="col-12">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <textarea name="diagnostico" class="form-control" rows="3"></textarea>
          </div>

          <!-- Estado Pago -->
          <div class="col-md-6">
            <label for="estado_pago" class="form-label">Estado de Pago</label>
            <select name="estado_pago" class="form-control" required>
              <option value="pendiente">Pendiente</option>
              <option value="pagado">Pagado</option>
              <option value="facturado">Facturado</option>
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
