{{-- resources/views/admin/doctors/_create-modal.blade.php --}}
<div class="modal fade" id="createDoctorModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Agregar Doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Apellido</label>
              <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Teléfono</label>
              <input type="text" name="phone" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Licencia</label>
              <input type="text" name="license_number" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Especialidades</label>
              <select name="specialty_ids[]" class="form-select" multiple required>
                @foreach($specialties as $specialty)
                  <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Biografía</label>
              <textarea name="bio" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-12">
              <label class="form-label">Foto de perfil</label>
              <input type="file" name="photo" class="form-control">
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
