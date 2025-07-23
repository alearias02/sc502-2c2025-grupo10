// public/js/appointments.js

// Selecciona todos los campos con la clase flatpickr-datetime
document.querySelectorAll('.flatpickr-datetime').forEach(el => {
  flatpickr(el, {
    enableTime: true,
    time_24hr: true,
    dateFormat: "Y-m-d\\TH:i",
    minuteIncrement: 30,
    minDate: "today",
    // opcional: limita a rangos de disponibilidad luego
  });
});


document.addEventListener('DOMContentLoaded', () => {
  axios.defaults.baseURL = '/api';

  // — Create —
  const createForm = document.getElementById('createAppointmentForm');
  if (createForm) {
    createForm.addEventListener('submit', async e => {
      e.preventDefault();
      const formData = new FormData(createForm);
      try {
        await axios.post('/appointments', formData);
        location.reload();
      } catch(err) {
        const resp = err.response;
        if (resp && resp.status === 422) {
          const msgs = Object.values(resp.data.errors).flat();
          alert('Errores:\n' + msgs.join('\n'));
        } else {
          alert('Error al crear cita.');
        }
      }
    });
  }

  // — Edit —
  const editModal = document.getElementById('editAppointmentModal');
  const editForm  = document.getElementById('editAppointmentForm');
  if (editModal && editForm) {
    editModal.addEventListener('show.bs.modal', e => {
      const b = e.relatedTarget.dataset;
      document.getElementById('delete_appointment_id').value = b.id;
      document.getElementById('edit_appointment_id').value  = b.id;
      document.getElementById('edit_doctor_id').value       = b.doctorId;
      document.getElementById('edit_patient_id').value      = b.patientId;
      document.getElementById('edit_scheduled_at').value    = b.scheduledAt;
      document.getElementById('edit_duration_minutes').value= b.durationMinutes;
      document.getElementById('edit_status').value          = b.status;
      document.getElementById('edit_notes').value           = b.notes || '';
    });

    editForm.addEventListener('submit', async e => {
      e.preventDefault();
      const id = document.getElementById('edit_appointment_id').value;
      const formData = new FormData(editForm);
      try {
        await axios.post(`/appointments/${id}`, formData, {
          headers: {'X-HTTP-Method-Override':'PUT'}
        });
        location.reload();
      } catch(err) {
        const resp = err.response;
        if (resp && resp.status === 422) {
          const msgs = Object.values(resp.data.errors).flat();
          alert('Errores:\n' + msgs.join('\n'));
        } else {
          alert('Error al actualizar cita.');
        }
      }
    });
  }

  // — Delete —
  const deleteModal = document.getElementById('deleteAppointmentModal');
  const deleteForm  = document.getElementById('deleteAppointmentForm');
  if (deleteModal && deleteForm) {
    deleteModal.addEventListener('show.bs.modal', e => {
      document.getElementById('delete_appointment_id').value = e.relatedTarget.dataset.id;
    });

    deleteForm.addEventListener('submit', async e => {
      e.preventDefault();
      const id = document.getElementById('delete_appointment_id').value;
      try {
        await axios.delete(`/appointments/${id}`);
        location.reload();
      } catch {
        alert('Error al eliminar cita.');
      }
    });
  }
});
