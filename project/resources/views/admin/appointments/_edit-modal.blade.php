<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editAppointmentForm">
        @csrf @method('PUT')
        <input type="hidden" id="edit_appointment_id" name="appointment_id">

        <div class="modal-header">
          <h5 class="modal-title">Editar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Doctor</label>
              <select name="doctor_id" id="edit_doctor_id" class="form-select" required>
                @foreach($doctors as $doc)
                  <option value="{{ $doc->id }}">
                    {{ $doc->first_name }} {{ $doc->last_name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Paciente</label>
              <select name="patient_id" id="edit_patient_id" class="form-select" required>
                @foreach($patients as $pat)
                  <option value="{{ $pat->id }}">
                    {{ $pat->first_name }} {{ $pat->last_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Fecha y Hora</label>
              <input type="datetime-local" name="scheduled_at" id="edit_scheduled_at"
                     class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Duración (min)</label>
              <input type="number" name="duration_minutes" id="edit_duration_minutes"
                     class="form-control" min="5" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Estado</label>
              <select name="status" id="edit_status" class="form-select" required>
                <option value="pending">Pendiente</option>
                <option value="confirmed">Confirmada</option>
                <option value="cancelled">Cancelada</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Notas</label>
              <textarea name="notes" id="edit_notes" class="form-control" rows="2"></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
