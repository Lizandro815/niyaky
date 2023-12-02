<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos para los enlaces */
        header .nav-link,
        header a {
            text-decoration: none;
            font-weight: bold;
            /* Texto en negrita */
            color: white !important;
            /* Heredar el color del padre */
            transition: color 0.3s;
            /* Transición suave de colores */
        }

        header .nav-link:hover,
        header a:hover {
            color: orange !important;
            text-decoration: none;
        }

        /* Estilos para los íconos de redes sociales */
        header .fab {
            font-size: 1.5rem;
            margin-right: 8px;
            color: white;
        }

        header .fab:hover {
            color: orange;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* Estilos para pantallas medianas y grandes */
        @media (min-width: 768px) {

            .logo {
                width: 70px;
                height: auto;
            }

        }
    </style>
</head>

<body>
    <header style="background-color: rgba(0, 0, 0, 0.5) !important;" class="py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Logo de la empresa -->
                <a class="navbar-brand" href="../../niyaky/index.php">
                    <img class="logo" src="../../../niyaky/assets/images/logo.png" width="60px" height="60px"
                        alt="Logo">
                </a>

                <!-- Icono de hamburguesa -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navegación -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="../../niyaky/index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../niyaky/nosotros.php">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../niyaky/contacto.php">Contacto</a></li>
                    </ul>
                </div>

                <!-- Información de redes sociales y teléfono -->
                <div class="d-none d-lg-flex align-items-center">
                    <a href="tel:+529971330471" class="navbar-phone mr-3" style="font-weight: 400;">Tel: (997)
                        133-0471</a>
                    <a href="https://www.facebook.com/NiyakyTzucacab/" class="mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/niyaky_una_probadita_oriental/"><i class="fab fa-instagram"></i></a>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>