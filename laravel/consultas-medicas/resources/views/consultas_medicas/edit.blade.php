<!-- Modal Editar Consulta Médica -->
<div class="modal fade" id="modal_edit{{ $consulta->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $consulta->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel{{ $consulta->id }}">Actualizar Consulta Médica</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('consultas_medicas.update', $consulta->id) }}" method="POST">
          @csrf

          <div class="row g-3">

            <!-- Paciente -->
            <div class="col-md-6">
              <label for="id_paciente" class="form-label">Paciente *</label>
              <select class="form-control" name="id_paciente" required>
                <option value="">Seleccione...</option>
                @foreach($pacientes as $paciente)
                  <option value="{{ $paciente->id }}" {{ $consulta->id_paciente == $paciente->id ? 'selected' : '' }}>
                    {{ $paciente->nombre }} {{ $paciente->apellido }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Tipo de Consulta -->
            <div class="col-md-6">
              <label for="tipo_consulta" class="form-label">Tipo de Consulta *</label>
              <select class="form-control" name="tipo_consulta" required>
                <option value="">Seleccione...</option>
                <option value="primera vez" {{ $consulta->tipo_consulta === 'primera vez' ? 'selected' : '' }}>Primera vez</option>
                <option value="control" {{ $consulta->tipo_consulta === 'control' ? 'selected' : '' }}>Control</option>
                <option value="urgencia" {{ $consulta->tipo_consulta === 'urgencia' ? 'selected' : '' }}>Urgencia</option>
                <option value="seguimiento" {{ $consulta->tipo_consulta === 'seguimiento' ? 'selected' : '' }}>Seguimiento</option>
              </select>
            </div>

            <!-- Fecha de Consulta -->
            <div class="col-md-6">
              <label for="fecha_consulta" class="form-label">Fecha de Consulta *</label>
              <input type="date" class="form-control" name="fecha_consulta" value="{{ $consulta->fecha_consulta }}" required>
            </div>

            <!-- Motivo -->
            <div class="col-md-6">
              <label for="motivo" class="form-label">Motivo *</label>
              <input type="text" class="form-control" name="motivo" value="{{ $consulta->motivo }}" required>
            </div>

            <!-- Diagnóstico -->
            <div class="col-12">
              <label for="diagnostico" class="form-label">Diagnóstico</label>
              <textarea class="form-control" name="diagnostico" rows="3">{{ $consulta->diagnostico }}</textarea>
            </div>

            <!-- Estado de Pago -->
            <div class="col-md-6">
              <label for="estado_pago" class="form-label">Estado de Pago *</label>
              <select class="form-control" name="estado_pago" required>
                <option value="pendiente" {{ $consulta->estado_pago === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagado" {{ $consulta->estado_pago === 'pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="facturado" {{ $consulta->estado_pago === 'facturado' ? 'selected' : '' }}>Facturado</option>
              </select>
            </div>

          </div>

          <!-- Botón -->
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-outline-success">Actualizar Consulta</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
