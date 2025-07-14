{{-- resources/views/admin/doctors/_delete-modal.blade.php --}}
<div class="modal fade" id="deleteDoctorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteDoctorForm" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que deseas eliminar este doctor?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
