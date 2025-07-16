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
            data-first-name="{{ $doctor->first_name }}"
            data-last-name="{{ $doctor->last_name }}"
            data-email="{{ $doctor->email }}"
            data-phone="{{ $doctor->phone }}"
            data-license-number="{{ $doctor->license_number }}"
            data-bio="{{ $doctor->bio }}"
            data-specialty-ids="{{ $doctor->specialties->pluck('id')->join(',') }}"
          >
            <i class="fas fa-pencil-alt"></i>
          </button>
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
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Tu JS de doctores -->
<script src="{{ asset('js/doctors.js') }}"></script>
@endpush
