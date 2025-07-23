<div class="modal fade" id="createAppointmentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="createAppointmentForm">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Agregar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Doctor</label>
              <select name="doctor_id" id="create_doctor_id" class="form-select" required>
                <option value="">Seleccione...</option>
                @foreach($doctors as $doc)
                  <option value="{{ $doc->id }}">
                    {{ $doc->first_name }} {{ $doc->last_name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Paciente</label>
              <select name="patient_id" id="create_patient_id" class="form-select" required>
                <option value="">Seleccione...</option>
                @foreach($patients as $pat)
                  <option value="{{ $pat->id }}">
                    {{ $pat->first_name }} {{ $pat->last_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Fecha y Hora</label>
              <input type="datetime-local" name="scheduled_at" id="create_scheduled_at"
                     class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Duración (min)</label>
              <input type="number" name="duration_minutes" id="create_duration_minutes"
                     class="form-control" value="30" min="5" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Estado</label>
              <select name="status" id="create_status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Notas</label>
              <textarea name="notes" id="create_notes" class="form-control" rows="2"></textarea>
            </div>
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
