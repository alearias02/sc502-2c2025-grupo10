{{-- resources/views/admin/doctors/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Doctores')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Gestión de Doctores</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
      <i class="fas fa-plus"></i> Agregar Doctor
    </button>
  </div>

  <table class="table table-hover">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Especialidades</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($doctors as $doctor)
      <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
        <td>{{ $doctor->id }}</td>
        <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->specialties->pluck('name')->join(', ') }}</td>
        <td class="text-end">
          <button
            class="btn btn-sm btn-warning me-1"
            data-bs-toggle="modal"
            data-bs-target="#editDoctorModal"
            data-id="{{ $doctor->id }}"
            data-first_name="{{ $doctor->first_name }}"
            data-last_name="{{ $doctor->last_name }}"
            data-email="{{ $doctor->email }}"
            data-phone="{{ $doctor->phone }}"
            data-license_number="{{ $doctor->license_number }}"
            data-bio="{{ $doctor->bio }}"
            data-specialty_ids="{{ $doctor->specialties->pluck('id')->join(',') }}"
          ><i class="fas fa-pencil-alt"></i></button>
          <button
            class="btn btn-sm btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteDoctorModal"
            data-id="{{ $doctor->id }}"
          ><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center py-4">No hay doctores registrados.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@include('admin.doctors._create-modal')
@include('admin.doctors._edit-modal')
@include('admin.doctors._delete-modal')
@endsection

@push('scripts')
<script>
  const createForm = document.getElementById('createDoctorForm');
    createForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      const formData = new FormData(createForm);
      try {
        const { data } = await axios.post('/doctors', formData, {
          headers: { 'Content-Type': 'multipart/form-data' }
        });
        //actualizar la tabla en pantallas sin recargar
        location.reload(); // o insertar la nueva fila dinámicamente
      } catch(err) {
      console.error('Error completo:', err);

      if (err.response) {
        console.error('Response data:', err.response.data);
        console.error('Response status:', err.response.status);
        console.error('Response headers:', err.response.headers);

        if (err.response.status === 422) {
          // Mostrar errores de validación
          const errors = err.response.data.errors;
          let mensajes = [];
          Object.values(errors).forEach(arr => mensajes.push(...arr));
          alert('Errores de validación:\n' + mensajes.join('\n'));
          return;
        }

        alert(`Error ${err.response.status}: ${JSON.stringify(err.response.data)}`);
        return;
      }

      alert('Error de red o servidor: ' + err.message);
    }
    });

  // Edit modal: llenar campos
  var editModal = document.getElementById('editDoctorModal');
  editModal.addEventListener('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var id = btn.dataset.id;
    var form = document.getElementById('editDoctorForm');
    form.action = '/admin/doctors/' + id;

    document.getElementById('edit_first_name').value = btn.dataset.first_name;
    document.getElementById('edit_last_name').value  = btn.dataset.last_name;
    document.getElementById('edit_email').value      = btn.dataset.email;
    document.getElementById('edit_phone').value      = btn.dataset.phone;
    document.getElementById('edit_license_number').value = btn.dataset.license_number;
    document.getElementById('edit_bio').value        = btn.dataset.bio;

    var ids = btn.dataset.specialty_ids.split(',');
    var select = document.getElementById('edit_specialty_ids');
    Array.from(select.options).forEach(opt => {
      opt.selected = ids.includes(opt.value);
    });
  });

  // Delete modal: ajustar acción
  var deleteModal = document.getElementById('deleteDoctorModal');
  deleteModal.addEventListener('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var id = btn.dataset.id;
    var form = document.getElementById('deleteDoctorForm');
    form.action = '/admin/doctors/' + id;
  });
</script>
@endpush
