{{-- resources/views/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Plaza Médica')

@section('content')
  <!-- Logo principal -->
  <div class="container text-center my-4">
    <img src="{{ asset('img/plazamedica_logo.jpg') }}" class="img-fluid" alt="Logo">
  </div>

  <!-- Servicios / Especialistas -->
  <section id="servicios" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5" data-aos="zoom-in">Nuestros Especialistas</h2>
    <div class="row g-4">
      @foreach($especialistas as $especialista)
        <div
          class="col-md-4"
          data-aos="fade-up"
          data-aos-delay="{{ $loop->index * 100 }}"
        >
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ $especialista['nombre'] }}</h5>
              <p class="card-text">{{ $especialista['especialidad'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

  <!-- Contacto -->
  <section id="contacto" class="py-5 bg-custom-pink">
        <div class="container" data-aos="fade-up">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="text-center mb-4">
                <p>📞 Tel: +506 2772-4444</p>
                <p>✉️ Email: plaza.medicapz@gmail.com</p>
                <p>📍 75 metros norte del hospital Escalante Pradilla, San Isidro del General, Costa Rica</p>
            </div>
            <div class="ratio ratio-16x9" data-aos="zoom-in-up">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3936.586251756693!2d-83.70662242427382!3d9.369831683559264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa14eec2a9d0bb1%3A0x4d1b5a4fe5c58890!2sPlaza%20Medica!5e0!3m2!1ses!2scr!4v1748295664705!5m2!1ses!2scr"
                    style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
