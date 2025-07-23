@extends('layouts.app')

@section('title', 'Gestión de Citas')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Gestión de Citas</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAppointmentModal">
      <i class="fas fa-plus"></i> Agregar Cita
    </button>
  </div>

  <table class="table table-hover">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Doctor</th>
        <th>Paciente</th>
        <th>Fecha y Hora</th>
        <th>Duración (min)</th>
        <th>Estado</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($appointments as $apt)
      <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
        <td>{{ $apt->id }}</td>
        <td>{{ $apt->doctor->first_name }} {{ $apt->doctor->last_name }}</td>
        <td>{{ $apt->patient->first_name }} {{ $apt->patient->last_name }}</td>
        <td>{{ \Carbon\Carbon::parse($apt->scheduled_at)->format('Y-m-d H:i') }}</td>
        <td>{{ $apt->duration_minutes }}</td>
        <td>{{ ucfirst($apt->status) }}</td>
        <td class="text-end">
          <button class="btn btn-sm btn-warning me-1"
            data-bs-toggle="modal"
            data-bs-target="#editAppointmentModal"
            data-id="{{ $apt->id }}"
            data-doctor-id="{{ $apt->doctor_id }}"
            data-patient-id="{{ $apt->patient_id }}"
            data-scheduled-at="{{ \Carbon\Carbon::parse($apt->scheduled_at)->format('Y-m-d\TH:i') }}"
            data-duration-minutes="{{ $apt->duration_minutes }}"
            data-status="{{ $apt->status }}"
            data-notes="{{ $apt->notes }}"
          ><i class="fas fa-pencil-alt"></i></button>

          <button class="btn btn-sm btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteAppointmentModal"
            data-id="{{ $apt->id }}"
          ><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="7" class="text-center py-4">No hay citas registradas.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@include('admin.appointments._create-modal')
@include('admin.appointments._edit-modal')
@include('admin.appointments._delete-modal')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/appointments.js') }}"></script>
@endpush
