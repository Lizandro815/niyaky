<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/images/niyaky.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niyaky</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="./css/index.css">

</head>

<body>
    <?php
        include 'php/partials/header.php'; 
    ?>

    <!-- Inicio del carrusel -->
    <div id="miCarrusel" class="carousel slide" data-ride="carousel">

        <!-- Indicadores del carrusel -->
        <ol class="carousel-indicators">
            <li data-target="#miCarrusel" data-slide-to="0" class="active"></li>
            <li data-target="#miCarrusel" data-slide-to="1"></li>
        </ol>
        <!-- Contenido del carrusel -->
        <div class="carousel-inner">
            <!-- Primer slide -->
            <div class="carousel-item active">
                <img src="./assets/images/niyaky_1.jpg" class="d-block w-100" alt="Descripción de la imagen 1">
                <div class="carousel-caption">
                    <h5>Sabor Auténtico en Cada Bocado</h5>
                    <p>En NIYAKY, nuestra misión es más que simplemente servir comida. Te sumergimos en una aventura de
                        sabores que te transporta directamente al corazón del oriente. Cada bocado es un viaje, una
                        experiencia única que celebra la verdadera esencia de la gastronomía oriental.</p>
                </div>
            </div>
            <!-- Segundo slide -->
            <div class="carousel-item">
                <img src="./assets/images/niyaky_2.jpg" class="d-block w-100" alt="Descripción de la imagen 2">
                <div class="carousel-caption">
                    <h5>¿Estás listo para embarcarte en esta aventura de sabor?</h5>
                    <p>Nuestros guisos, preparados con amor y dedicación, son un abrazo al alma y una caricia al
                        paladar. Porque sabemos que la comida es mucho más que solo alimentar el cuerpo; es una
                        experiencia, es memoria, es cultura.</p>
                </div>
            </div>
        </div>
        <!-- Controles del carrusel (flechas izquierda y derecha) -->
        <a class="carousel-control-prev" href="#miCarrusel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#miCarrusel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <!-- Fin del carrusel -->

    <!-- Sección Acerca de -->
    <div class="about-section container-fluid con">
        <div class="row d-flex align-items-center">
            <div class="col-12 text-white">
                <h1 class="display-4 about-title">Descubre la Historia</h1>
                <p class="lead">
                    Desde febrero de 2020, CASITA NIYAKY ha sido el rincón donde la tradición oriental y la calidez
                    local se encuentran. Iniciamos como un sueño entre hermanos, con el deseo de compartir la riqueza de
                    los sabores orientales con nuestra comunidad. <br>
                    Es por ello que cada plato es una fusión de ingredientes locales, adquiridos de
                    negocios del municipio, y sazonadores y condimentos de importación, cuidadosamente seleccionados
                    para recrear el auténtico sabor oriental.
                </p>
                <a href="./nosotros.php" class="btn btn-danger" id="btn-about">SOBRE NOSOTROS</a>
            </div>
        </div>
    </div>


    <!-- Sección Menú -->
    <div class="menu-section container-fluid">
        <div class="row menu">
            <!-- Primera columna: Texto Descriptivo -->
            <div class="col-md-9 menu-text-section">
                <h2 class="menu-title">Menú</h2>
                <p class="menu-description">Sumérgete en una aventura culinaria que combina la esencia oriental con el
                    corazón local. ¿Listo para descubrirlo?.</p>
                <br>
                <!-- Platillos -->
                <div class="d-flex flex-wrap justify-content-between">

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_FIDEOS" class="menu-link">
                            <img src="./assets/images/pastas.png" alt="Icono Sopas" class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">FIDEOS</h4>

                        </a>
                    </div>

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_ARROZ" class="menu-link">
                            <img src="./assets/images/arroz.png" alt="Icono Sopas" class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">ARROZ</h4>

                        </a>
                    </div>

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_PICOSO" class="menu-link">
                            <img src="./assets/images/picante.png" alt="Icono Sopas" class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">PICOSO</h4>

                        </a>
                    </div>

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_DULCE_SALADO" class="menu-link">
                            <img src="./assets/images/dulce-pico2.png" alt="Icono Sopas"
                                class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">DULCE/SALADO</h4>

                        </a>
                    </div>

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_COMPLEMENTOS" class="menu-link">
                            <img src="./assets/images/papas.png" alt="Icono Sopas" class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">COMPLEMENTOS</h4>

                        </a>
                    </div>

                    <div class="col-md-6 col-6 dish-item d-flex flex-column align-items-center text-center mb-4">
                        <a href="URL_ROLLITOS" class="menu-link">
                            <img src="./assets/images/primavera.png" alt="Icono Sopas" class="img-fluid dish-icon mb-2">
                            <h4 class="dish-title">ROLLITOS DE PRIMAVERA</h4>

                        </a>
                    </div>
                </div>
            </div>  

            <!-- Segunda columna: Imagen -->
            <div class="col-md-3 menu-img-section d-flex align-items-center">
                <img src="./assets/images/menu_0.jpg" alt="Imagen de Menú" class="menu-image" id="ima-menu">
            </div>

        </div>
    </div>


    <div class="bao-bun-section container-fluid" style="background-color: #fff;">
        <div class="row cont-sec">
            <!-- Tercera sección -->
            <!-- Columna de contenido -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    <h2>SUSHI EMPANIZADO</h2>
                    <p>Alga nori envuelta en arroz de sushi empanizado y rellena de vegetales,
                     queso crema con pollo o camarón. Acompañado de salsa agridulce y salsa de soya.
                    </p>
                </div>
            </div>
            <!-- Columna de imagen -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="./assets/images/sus1-fotor.png" alt="Bao Bun" class="img-fluid">
            </div>
        </div>

    </div>
    <div class="bao-bun-section container-fluid" style="background-color:  #fcf3dc;">
        <div class="row cont-sec">
            <!-- Tercera sección -->
            <!-- Columna de contenido -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    <h2>SUSHI DALMATA</h2>
                    <p>Alga nori envuelta en arroz de sushi con ajonjolí negro y 
                        relleno de vegatales, queso crema con pollo o camarón.
                        Acompañado de salsa agridulce y salsa de soya. 
                    </p>
                </div>
            </div>
            <!-- Columna de imagen -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="./assets/images/sus-fotor.png" alt="Bao Bun" class="img-fluid">
            </div>
        </div>

    </div>
    <div class="bao-bun-section container-fluid" style="background-color: #fff;">
        <div class="row cont-sec">
            <!-- Tercera sección -->
            <!-- Columna de contenido -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    <h2>SUSHI MAKI</h2>
                    <p>Arroz de sushi envuelto en algo nori y relleno de vegetales, queso crema,
                        con pollo o camarón. Acompañado de salsa agridulce y salsa de soya.
                    </p>
                </div>
            </div>
            <!-- Columna de imagen -->
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="./assets/images/sus2-fotor.png" alt="Bao Bun" class="img-fluid">
            </div>
        </div>

    </div>

    <div class="container-fluid"
        style="width: 100%; margin-bottom: 50px; background-color: rgba(0, 0, 0, 0.5); padding-bottom: 40px; padding-top: 40px;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-white">Lo que dicen <span class="text-orange">nuestros</span> clientes</h2>
                <p class="text-white mt-4">Calificación promedio del cliente <span class="text-yellow">★★★★★</span></p>
                <p class="text-white">4.82 (Numero de votos)</p>
            </div>
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="ruta-de-tu-imagen" alt="Imagen de Cliente" class="rounded-circle" width="100">
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut labore, neque
                            similique pariatur atque consectetur veritatis impedit aliquam, nemo, sapiente expedita
                            asperiores libero at! Laboriosam, beatae. Deleniti a mollitia iure?</p>
                        <p class="font-weight-bold">Nombre usuario</p>
                        <p>★★★★★</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>