{{-- resources/views/nosotros.blade.php --}}
@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')
  <!-- Sección Nosotros -->
  <section class="py-5">
    <div class="container" data-aos="fade-up">
      <h2 class="text-center mb-4">¿Quiénes Somos?</h2>
      <p class="text-center">
        Plaza Médica es una clínica comprometida con la salud integral de nuestros pacientes.
        Contamos con un equipo de especialistas altamente capacitados, tecnología moderna y
        un ambiente cálido para brindar atención de calidad y confianza.
      </p>
      <div class="row mt-5">
        <div class="col-md-6" data-aos="fade-right">
          <h4>Misión</h4>
          <p>Brindar atención médica integral, oportuna y humanizada a nuestros pacientes, con altos estándares de calidad y ética profesional.</p>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <h4>Visión</h4>
          <p>Ser el centro médico de referencia en la región, reconocido por la excelencia en nuestros servicios y por nuestro compromiso con la salud de la comunidad.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Carrusel de la clínica -->
  <section class="py-5 bg-light">
    <div class="container" data-aos="zoom-in">
      <h2 class="text-center mb-4">Nuestra Clínica</h2>
      <div id="carouselClinica" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/clinica1.jpg') }}" class="d-block w-100" alt="Recepción">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/clinica2.jpg') }}" class="d-block w-100" alt="Consultorio">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/clinica3.jpg') }}" class="d-block w-100" alt="Sala de Espera">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselClinica" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselClinica" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </section>
@endsection
