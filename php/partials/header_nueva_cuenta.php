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
            color: white !important;
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
        }


        /* Estilos específicos para móviles */

        @media (max-width: 991px) {
            .navbar {
                padding: 0.5rem 1rem;
                /* Reduce el padding del navbar */
            }

            .navbar-toggler {
                padding: 0.25rem 0.5rem;
                /* Reduce el padding del toggler */
                margin-right: 5px;
                /* Reduce el margen derecho */
            }



            .navbar-mobile-search {
                flex-grow: 1;
                /* Asegúrate de que la barra de búsqueda usa todo el espacio disponible */
                margin-right: 5px;
                /* Reduce el margen derecho */
                width: 60%;
            }

            .navbar-mobile-search .form-control {
                padding: 0.375rem 0.75rem;
                /* Reduce el padding de la barra de búsqueda */
            }


            /* Reducir el tamaño del texto y los iconos podría ayudar también */
            .nav-link {
                padding-left: 10px !important;
                font-size: 1rem;
                color: black !important;
            }

            .nav-link i {
                font-size: 1rem;
                /* Reduce el tamaño de los íconos */
            }

            .fa-shopping-cart {
                font-size: 20px !important;
            }

            /* Estilos para la navegación móvil */
            #navbarMobile {
                position: fixed;
                /* Fijo en la pantalla */
                top: 0;
                /* Arriba del todo */
                left: -100%;
                /* Inicialmente escondido a la izquierda */
                width: 80%;
                /* Puede cambiar esto al ancho que prefieras */
                height: 100%;
                /* Altura completa de la pantalla */
                background-color: #fff;
                /* Fondo blanco */
                z-index: 1050;
                /* Sobre el contenido de la página */
                overflow-y: auto;
                /* Si hay mucho contenido, permite scroll */
                transition: transform 0.3s ease;
                /* Transición suave para el menú */
                padding-left: 20%;
            }

            /* Estilo para mostrar el menú */
            #navbarMobile.show {
                transform: translateX(100%);
                /* Mueve el menú a la vista */
            }
        }

        /* Agrega el estilo para el fondo oscuro */
        body.navbar-open {
            position: fixed;
            /* Opcional: si quieres fijar el contenido de la página cuando el menú esté abierto */
            width: 100%;
            height: 100%;
            overflow: hidden;
            /* Opcional: para evitar el desplazamiento del fondo */
        }

        body.navbar-open::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo negro con opacidad */
            z-index: 1040;
            /* Asegúrate de que esto esté por debajo del z-index de tu navbarMobile */
        }



        /* Estilos para los íconos dentro de los enlaces de navegación */
        .navbar .nav-item .nav-link i {
            margin-right: 5px;
            /* Añade un espacio entre el ícono y el texto */
        }

        /* Estilos para el ícono del carrito de compras */
        .navbar-cart .nav-link {
            padding: 0.5rem;
            /* Ajusta el padding alrededor del ícono del carrito */
        }


        /* Estilos para la sección contenedora */
        .navbar-custom-section {
            display: flex;
            /* Usa flexbox para alinear los elementos horizontalmente */
            align-items: center;
            /* Alineación vertical de los elementos */
        }

        /* Estilos para la sección personalizada de enlaces */
        .navbar-custom-links {
            display: flex;
            /* Mantiene los enlaces en línea */
            align-items: center;
            /* Centra los elementos verticalmente */
        }

        .custom-nav-item {
            padding: 0 10px;
            /* Espacio alrededor de cada enlace */
            display: flex;
            /* Permite flexión para íconos y texto */
            align-items: center;
            /* Alineación vertical */
            color: #333;
            /* Color del texto y los íconos */
            text-decoration: none;
            /* Remueve el subrayado del enlace */
            font-size: 15px !important;
            padding-top: 35px !important;
        }

        .custom-nav-item i {
            margin-right: 5px;
            /* Espacio entre el ícono y el texto */
        }

        .custom-nav-item span {
            display: block;
            /* Hace que el texto ocupe su propia línea */
        }

        /* Estilo para el carrito */
        .navbar-cart .nav-link {
            display: flex;
            /* Alinea el ícono y el texto */
            align-items: center;
            /* Alineación vertical */
            text-decoration: none;
            /* Remueve el subrayado del enlace */
            color: orange;
            /* Color del texto y el ícono */
        }




        .es-user-login-section {
            border-radius: 5px;
            /* Bordes redondeados */
            margin-top: 5px;
            /* Espacio en la parte superior */
        }

        .es-user-login-section .es-user-icon {
            font-size: 2rem !important;
            /* Tamaño del icono de usuario */
            color: #333;
            /* Color del icono */
            padding-top: 20px;
        }

        .es-user-login-section p {
            color: #333;
            /* Color del texto */
            font-weight: bold;
            /* Negrita para el título */
        }

        .es-user-login-section small {
            color: #333;
            /* Color del texto secundario */
        }

        .es-user-login-section .btn-primary {
            background-color: orange;
            /* Botón azul para que coincida con la imagen */
            border: none;
            /* Sin bordes para el botón */
        }

        .custom-toggler .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        #carrito {
            color: orange !important;
        }

        .btn-orden:hover {
            /* Cambia el color de fondo y el color del texto en el estado hover */
            background-color: #d35400;
            /* Un tono más oscuro de naranja, por ejemplo */
            color: #fff !important;
            /* Agrega cualquier otro estilo que quieras aplicar en el hover, como un cambio en el borde, sombra, etc. */
        }
        @media (max-width: 600px) {
        #navbarNav h4 {
            font-size: 18px; /* o el tamaño que prefieras */
        }
    }
    @media (min-width: 1024px) {
        .navbar-text {
            padding-top: 10px;
        }
    }
    </style>
</head>

<body>
    <header style="background-color: rgba(0, 0, 0, 0.5) !important;" class="py-2">
        <div class="container">
            <!-- Navegación -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Logo de la empresa -->


                <div style="margin-left: 30px; display: flex;" class=" justify-content-center" id="navbarNav">
                    <a class="navbar-brand" href="../../niyaky/index.php">
                        <img class="logo" src="../../../niyaky/assets/images/logo.png" width="60px" height="60px"
                            alt="Logo">
                    </a>
                    <div class="navbar-text">
                        <h4 style="color: black;" class="navbar-text">
                        ¡Únete a la familia Niyaky y disfruta de una experiencia culinaria única!
                        </h4>
                    </div>

                </div>
                
            </nav>
        </div>
    </header>

</body>

</html>