<?php require_once('inicio_sesion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaza Médica</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand position-absolute top-50 translate-middle-y" href="index.php" style="left: 1rem;">
                <img src="../img/plazamedica_logo3.png" alt="Logo Plaza Médica" style="height: 60px;">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end text-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Especialistas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>

                    <?php if (isset($_SESSION['usuario'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['usuario']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                                <li><a class="dropdown-item" href="hacer_cita.php">Hacer Cita</a></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="tel:+50627724444" title="Llamar">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Logo -->
    <div class="container text-center my-4" data-aos="fade-down">
        <img src="../img/plazamedica_logo.jpg" alt="Logo Plaza Médica" class="img-fluid logo-img">
    </div>

    <!-- Servicios -->
    <section id="servicios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="zoom-in">Nuestros Especialistas</h2>
            <div class="row g-4">
                <?php
                $especialistas = [
                    ["Dra. Mayra Becerra Gómez", "Radiología e Imágenes Médicas"],
                    ["Dr. Dimas Bravo Saturno", "Cirugía General y Proctología"],
                    ["Dr. Alberto Zamora Arce", "Cirujano Endoscopista"],
                    ["Dr. Henry Rodríguez Retana", "Ginecología y Obstetricia"],
                    ["Dr. Daniel Zumbado Campos", "Otorrinolaringología"],
                    ["Dr. Luis Aguilar Avendaño", "Medicina General"],
                    ["Dr. Adolfo Hernández Arias", "Ortopedia y Traumatología"],
                    ["Dra. Laura Castro Jiménez", "Dermatología Clínica"],
                    ["Dr. Esteban Vega Morales", "Psiquiatría y Salud Mental"]
                ];
                $delay = 0;
                foreach ($especialistas as $e) {
                    echo '
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="' . $delay . '">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">' . $e[0] . '</h5>
                <p class="card-text">' . $e[1] . '</p>
              </div>
            </div>
          </div>';
                    $delay += 100;
                }
                ?>
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

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row">
            <p class="mb-2 mb-md-0">&copy; 2025 Plaza Médica. Todos los derechos reservados.</p>
            <div class="d-flex gap-3">
                <a href="https://facebook.com" target="_blank" class="text-decoration-none text-primary fs-4">
                    <i class="fab fa-facebook-square fs-2"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-decoration-none text-danger fs-4">
                    <i class="fab fa-instagram fs-2"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Flotante -->
    <a href="https://wa.me/50688175252" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            z-index: 999;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            text-decoration: none;
        }

        .whatsapp-float:hover {
            background-color: #1ebe5b;
        }
    </style>

    <!-- Bootstrap & AOS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>

</body>

</html>