<div class="modal fade" id="deleteAppointmentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteAppointmentForm">
        @csrf @method('DELETE')
        <input type="hidden" name="appointment_id" id="delete_appointment_id">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que deseas eliminar esta cita?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
