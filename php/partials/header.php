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

        .btn-orden {
            background-color: orange;
            color: white;
            border: none;
            /* Opcional: elimina el borde del botón */
            cursor: pointer;
            /* Cambia el cursor a una mano para indicar que es un botón */
        }

        .btn-orden:hover {
            background-color: #ffcc80;
            /* Cambia a un naranja más claro en hover */
            color: white;
            /* Mantiene el color de texto blanco */
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

                <div class="d-none d-lg-flex align-items-center">
                    <button onclick="window.open('./delivery/pedir.php', '_blank');" class="btn btn-orden" style="background-color: orange; color: white;">
                        Ordene Aquí
                    </button>
                </div>

            </nav>
        </div>
    </header>
</body>

</html>