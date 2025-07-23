{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Plaza Médica')</title>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
  />

  <!-- AOS CSS -->
  <link
    href="https://unpkg.com/aos@2.3.1/dist/aos.css"
    rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- FontAwesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    rel="stylesheet"
  />

  <!-- Tus estilos -->
  <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

  <!-- CSS para WhatsApp flotante -->
  <style>
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
      background-color: #25D366;
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      z-index: 1050;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      text-decoration: none;
    }
    .whatsapp-float:hover {
      background-color: #1ebe5b;
    }
  </style>

  @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/plazamedica_logo3.png') }}" height="60" alt="Logo Plaza Médica">
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="#servicios">Especialistas</a></li>
          <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Administración</a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('admin.doctors.index') }}">Doctores</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.appointments.index') }}">Citas</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tel:+50627724444"><i class="fas fa-phone-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido específico de cada vista -->
  <main class="flex-fill py-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-white py-3">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <p class="mb-2 mb-md-0">&copy; {{ now()->year }} Plaza Médica. Todos los derechos reservados.</p>
      <div class="d-flex gap-3">
        <a href="https://facebook.com" target="_blank" class="text-decoration-none text-primary fs-4">
          <i class="fab fa-facebook-square"></i>
        </a>
        <a href="https://instagram.com" target="_blank" class="text-decoration-none text-danger fs-4">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </div>
  </footer>

  <!-- WhatsApp flotante -->
  <a href="https://wa.me/50688175252" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    AOS.init({
      once: true,
      duration: 600
    });
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  axios.defaults.baseURL = '/api';
</script>
  @stack('scripts')
</body>
</html>
