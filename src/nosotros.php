<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros | Plaza Médica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand position-absolute top-50 translate-middle-y" href="#" style="left: 1rem;">
                <img src="../img/plazamedica_logo3.png" alt="Logo Plaza Médica" style="height: 60px;">
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end text-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Nosotros</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="tel:+50627724444" title="Llamar">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección Nosotros -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">¿Quiénes Somos?</h2>
            <p class="text-center">Plaza Médica es una clínica comprometida con la salud integral de nuestros pacientes. Contamos con un equipo de especialistas altamente capacitados, tecnología moderna y un ambiente cálido para brindar atención de calidad y confianza.</p>

            <div class="row mt-5">
                <div class="col-md-6">
                    <h4>Misión</h4>
                    <p>Brindar atención médica integral, oportuna y humanizada a nuestros pacientes, con altos estándares de calidad y ética profesional.</p>
                </div>
                <div class="col-md-6">
                    <h4>Visión</h4>
                    <p>Ser el centro médico de referencia en la región, reconocido por la excelencia en nuestros servicios y por nuestro compromiso con la salud de la comunidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Carrusel de la clínica -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Nuestra Clínica</h2>

            <div id="carouselClinica" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/clinica1.jpg" class="d-block w-100" alt="Recepción">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/clinica2.jpg" class="d-block w-100" alt="Consultorio">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/clinica3.jpg" class="d-block w-100" alt="Sala de Espera">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselClinica" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselClinica" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row">
            <p class="mb-2 mb-md-0">&copy; 2025 Plaza Médica. Todos los derechos reservados.</p>
            <div class="d-flex gap-3">
                <a href="https://www.facebook.com/p/Centro-M%C3%A9dico-Plaza-M%C3%A9dica-61550616548520/"
                    target="_blank" class="text-decoration-none text-primary fs-4">
                    <i class="fab fa-facebook-square fs-2"></i>
                </a>
                <a href="https://www.instagram.com/centromedicoplazamedica/" target="_blank"
                    class="text-decoration-none text-danger fs-4">
                    <i class="fab fa-instagram fs-2"></i>
                </a>
            </div>
        </div>
    </footer>

     
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>