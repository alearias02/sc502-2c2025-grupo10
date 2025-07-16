// public/js/doctors.js

document.addEventListener('DOMContentLoaded', () => {
  // Apunta todas las solicitudes a /api
  axios.defaults.baseURL = '/api';

  // ——— Create ———
  const createForm = document.getElementById('createDoctorForm');
  if (createForm) {
    createForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      try {
        await axios.post('/doctors', formData);
        location.reload();
      } catch(err) {
        console.error('Error completo:', err);
        if (err.response && err.response.status === 422) {
          const errors = err.response.data.errors;
          const mensajes = Object.values(errors).flat();
          alert('Errores de validación:\n' + mensajes.join('\n'));
        } else if (err.response) {
          alert(`Error ${err.response.status}: ${JSON.stringify(err.response.data)}`);
        } else {
          alert('Error de red o servidor: ' + err.message);
        }
      }
    });
  }

  // ——— Update ———
  const editModal = document.getElementById('editDoctorModal');
  const editForm  = document.getElementById('editDoctorForm');
  if (editModal && editForm) {
    // Al abrir modal, carga datos
    editModal.addEventListener('show.bs.modal', function(event) {
      const btn = event.relatedTarget;
      console.log('DATASET:', btn.dataset);

      const id            = btn.dataset.id;
      document.getElementById('edit_doctor_id').value      = id;
      document.getElementById('edit_first_name').value     = btn.dataset.firstName;
      document.getElementById('edit_last_name').value      = btn.dataset.lastName;
      document.getElementById('edit_email').value          = btn.dataset.email;
      document.getElementById('edit_phone').value          = btn.dataset.phone;
      document.getElementById('edit_license_number').value = btn.dataset.licenseNumber;
      document.getElementById('edit_bio').value            = btn.dataset.bio;

      const ids = btn.dataset.specialtyIds
        ? btn.dataset.specialtyIds.split(',').map(x => x.trim())
        : [];
      const select = document.getElementById('edit_specialty_ids');
      Array.from(select.options).forEach(opt => {
        opt.selected = ids.includes(opt.value);
      });
    });

    // Al enviar el formulario, usa POST + override para que PHP parsee multipart
    editForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      const id       = document.getElementById('edit_doctor_id').value;
      const formData = new FormData(this);

      try {
        await axios.post(
          `/doctors/${id}`,
          formData,
          { headers: { 'X-HTTP-Method-Override': 'PUT' } }
        );
        location.reload();
      } catch(err) {
        console.error('ERR en UPDATE:', err);
        if (err.response && err.response.status === 422) {
          const errores = err.response.data.errors;
          const mensajes = Object.values(errores).flat();
          alert('Errores al actualizar:\n' + mensajes.join('\n'));
        } else {
          alert('Error al actualizar el doctor.');
        }
      }
    });
  }

  // ——— Delete ———
  const deleteModal = document.getElementById('deleteDoctorModal');
  const deleteForm  = document.getElementById('deleteDoctorForm');
  if (deleteModal && deleteForm) {
    deleteModal.addEventListener('show.bs.modal', function(event) {
      const btn = event.relatedTarget;
      document.getElementById('delete_doctor_id').value = btn.dataset.id;
    });

    deleteForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      const id = document.getElementById('delete_doctor_id').value;
      try {
        await axios.delete(`/doctors/${id}`);
        location.reload();
      } catch(err) {
        console.error('Error al eliminar:', err);
        alert('Error al eliminar el doctor.');
      }
    });
  }
});
