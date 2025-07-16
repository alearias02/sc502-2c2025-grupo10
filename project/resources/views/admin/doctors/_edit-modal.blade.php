<div class="modal fade" id="editDoctorModal" tabindex="-1" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editDoctorForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="doctor_id" id="edit_doctor_id">

        <div class="modal-header">
          <h5 class="modal-title" id="editDoctorModalLabel">Editar Doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="edit_first_name" class="form-label">Nombre</label>
              <input type="text" name="first_name" id="edit_first_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="edit_last_name" class="form-label">Apellido</label>
              <input type="text" name="last_name" id="edit_last_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="edit_email" class="form-label">Email</label>
              <input type="email" name="email" id="edit_email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="edit_phone" class="form-label">Teléfono</label>
              <input type="text" name="phone" id="edit_phone" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="edit_license_number" class="form-label">Número de Licencia</label>
              <input type="text" name="license_number" id="edit_license_number" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="edit_specialty_ids" class="form-label">Especialidades</label>
              <select name="specialty_ids[]" id="edit_specialty_ids" class="form-select" multiple required>
                @foreach($specialties as $specialty)
                  <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="edit_bio" class="form-label">Biografía</label>
              <textarea name="bio" id="edit_bio" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-12">
              <label for="edit_photo" class="form-label">Foto de Perfil (opcional)</label>
              <input type="file" name="photo" id="edit_photo" class="form-control">
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
