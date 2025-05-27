<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaza Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Plaza Médica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Especialistas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Logo -->
    <div class="container text-center my-4">
        <img src="../img/plazamedica_logo.jpg" alt="Logo Plaza Médica" class="img-fluid logo-img">
    </div>

    <!-- Servicios -->
    <section id="servicios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros Especialistas</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dra. Mayra Becerra Gómez</h5>
                            <p class="card-text">Radiología e Imágenes Médicas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Dimas Bravo Saturno</h5>
                            <p class="card-text">Cirugía General y Proctología</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Alberto Zamora Arce</h5>
                            <p class="card-text">Cirujano Endoscopista</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Henry Rodríguez Retana</h5>
                            <p class="card-text">Ginecología y Obstetricia</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Daniel Zumbado Campos</h5>
                            <p class="card-text">Otorrinolaringología</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Luis Aguilar Avendaño</h5>
                            <p class="card-text">Medicina General</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Adolfo Hernández Arias</h5>
                            <p class="card-text">Ortopedia y Traumatología</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dra. Laura Castro Jiménez</h5>
                            <p class="card-text">Dermatología Clínica</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Esteban Vega Morales</h5>
                            <p class="card-text">Psiquiatría y Salud Mental</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-5 bg-custom-pink">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="text-center mb-4">
                <p>📞 Tel: +506 2772-4444</p>
                <p>✉️ Email: plaza.medicapz@gmail.com</p>
                <p>📍 75 metros norte del hospital Escalante Pradilla, San Isidro del General, Costa Rica</p>
            </div>

            <!-- Mapa -->
            <div class="ratio ratio-16x9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3936.586251756693!2d-83.70662242427382!3d9.369831683559264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa14eec2a9d0bb1%3A0x4d1b5a4fe5c58890!2sPlaza%20Medica!5e0!3m2!1ses!2scr!4v1748295664705!5m2!1ses!2scr"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2025 Plaza Médica. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>