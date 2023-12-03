<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/niyaky.png" type="image/png">
    <title>Nosotros</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="./css/nosotros.css">
</head>

<body>

    <?php
    include 'php/partials/header.php'; 
    ?>

    <div class="seccion-fondo">
        <div class="overlay-personalizado">
            <div class="container-personalizado">
                <div class="fila-texto">
                    <div class="columna-texto">
                        <!-- Aquí va el texto -->
                        <h1 class="texto-seccion">ACERCA DE NIYAKY</h1>
                        <p class="texto-seccion">Niyaky surge como emprendimiento de tres integrantes de la Familia
                            Cauich: Chef Nicté Dzul Cauich, Chef Yak´kij Dzul Cauich y Enrique Cauich Cel, quienes
                            deseosos de ofrecer algo nuevo y diferente al municipio y a la vez de generar una fuente
                            complementaria de ingresos económicos, deciden iniciar con COMIDA CHINA CAUICH, misma que en
                            cuestión de meses cambia a NIYAKY (NY: Nicté/ YA: Yak´kij/ KY: Kike).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 vistas-noso">
        <div class="row">
            <!-- Selector de vistas -->
            <div class="col-12 col-md-3">
                <div class="list-group d-md-block">
                    <!-- Contenedor para vista PC -->
                    <div class="d-none d-md-block">
                        <div class="list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="sobreNosotros" onclick="cargarContenido('sobreNosotros')">NUESTRA HISTORIA
                        </div>
                        <div class="list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="mision" onclick="cargarContenido('mision')">NUESTRA MISIÓN</div>
                        <div class="list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="metas" onclick="cargarContenido('metas')">NUESTRA VISION</div>
                        <div class="list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="valores" onclick="cargarContenido('valores')">NUESTROS VALORES</div>
                    </div>

                    <!-- Contenedor para vista móvil -->
                    <div class="d-flex d-md-none">
                        <div class="col-3 list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="sobreNosotros" onclick="cargarContenido('sobreNosotros')">NUESTRA HISTORIA
                        </div>
                        <div class="col-3 list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="mision" onclick="cargarContenido('mision')">NUESTRA MISIÓN</div>
                        <div class="col-3 list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="metas" onclick="cargarContenido('metas')">NUESTRA VISION</div>
                        <div class="col-3 list-group-item item-selector text-center d-flex align-items-center justify-content-center"
                            data-section="valores" onclick="cargarContenido('valores')">NUESTROS VALORES</div>
                    </div>
                </div>
            </div>



            <!-- Contenidos -->
            <div class="col-12 col-md-9">
                <div id="sobreNosotros" class="contenido">
                    <div class="container" id="event">
                        <div class="event-description text-center mb-4">
                            <h2>Titulo de linea 1</h2>
                            <p>Fue en el mes de febrero del 2020 cuando se inicia con el micronegocio en la c. 28 x 27 y
                                29, casa de la Familia Cauich Cel, ofreciendo un menú oriental con servicio únicamente a
                                domicilio. A los pocos meses de iniciar se ven en la necesidad de cerrar operaciones
                                debido al confinamiento de la pandemia COVID.</p>
                        </div>

                        <div class="barra-años">
                            <!-- Título encima de la línea de tiempo -->
                            <div class="text-center mb-2">
                                <h6>Selecciona un año a continuación</h6>
                            </div>

                            <div class="timeline d-flex justify-content-between">
                                <button class="btn  year active">2020</button>
                                <button class="btn  year">2021</button>
                                <button class="btn  year">2022</button>
                                <button class="btn  year">2023</button>
                            </div>
                        </div>

                    </div>


                </div>

                <div id="mision" class="contenido">
                    <div class="container" id="event">
                        <div class="mision-description text-center mb-4">
                            <h2>Titulo</h2>
                            <p>NIYAKY es una empresa familiar del giro de alimentos que ofrece a la población del
                                municipio de
                                Tzucacab una experiencia culinaria con sabor oriental, mediante la recreación de
                                platillos
                                asiáticos, conservado al máximo los ingredientes originales; logrando que el que pruebe
                                repita
                                la experiencia.</p>
                        </div>

                    </div>
                </div>

                <div id="metas" class="contenido">
                    <div class="container" id="event">
                        <div class="metas-description text-center mb-4">
                            <h2>Titulo</h2>
                            <p>En 2025 somos un establecimiento de alimentos formalmente establecido en el municipio de
                                Tzucacab, referente de calidad en cuanto a comida oriental, por el sabor, la variedad y
                                el
                                servicio. Rodeado de un entorno laboral con valores, con sentido de compromiso hacia la
                                sociedad, la colaboración con la economía local y la mejora continua de su servicio, y
                                así
                                proporcionar a nuestros clientes una probadita de la cocina asiática, transformándola en
                                toda
                                una experiencia culinaria que repitan una y otra vez.</p>
                        </div>

                    </div>
                </div>



                <div id="valores" class="contenido">
                    <div class="container" id="event">
                        <div class="valores-description mb-4">
                            <p> <span class="tit">Familia.</span> La familia por nacimiento o por elección representa la
                                naturaleza humana de vivir en conjunto para tener protección. Para los integrantes de la
                                familia
                                NIYAKY apoyarse unos a otros para llegar al objetivo común es fundamental. <br>
                                <span class="tit">Inclusión.</span>
                                Todos los seres humanos tenemos el derecho a ser tratados como tal y a tener las
                                condiciones para disfrutar de los derechos que por ley nos corresponde. Para ello todos
                                los
                                integrantes de la familia NIYAKY deberán estar conscientes de que cualquier ser humano
                                debe contar
                                con las condiciones necesarias para disfrutar de nuestro servicio. <br>
                                <span class="tit">Respeto.</span>
                                La pluralidad de la gente y los ecosistemas nos enriquece. Dentro de la familia NIYAKY
                                promovemos el respeto hacia cada individualidad de las personas y la relación que
                                existen entre los
                                seres vivos y los ecosistemas naturales. <br>
                                <span class="tit">Trabajo en equipo.</span>
                                La suma de fuerzas genera una fuerza mayor, la suma de talentos genera grandes
                                ideas. Para los integrantes de la familia NIYAKY trabajar hombro con hombro será e vital
                                importancia
                                de tal forma que las capacidades de la empresa se vean reforzadas. <br>
                                <span class="tit">Calidad.</span>
                                Cumplir con los requisitos que un producto o servicio requiere aumenta la posibilidad de
                                satisfacción del cliente. Es por ello que dentro de la familia NIYAKY cuidamos los
                                procesos internos
                                y externos para brindar lo mejor de nosotros a nuestros clientes e integrantes. <br>
                                <span class="tit">Mejora continua.</span>
                                Evolucionar es natural. En NIYAKY estaremos en constante evolución en todos los
                                ámbitos de tal forma que estemos en constante mejoría. <br>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section-video-bg d-flex justify-content-center align-items-center text-white">
        <div class="text-center">
            <h1>Nose que titulo poner</h1>
            <p>Descubre la emoción detrás de nuestro gran salto: de entregar sabores a domicilio a darles la
                bienvenida en nuestro propio espacio. ¡Revive con nosotros este memorable inicio!</p>
            <div class="video-container mt-4">
                <iframe src="https://www.youtube.com/embed/zHOLT6NNrLs" title="Niyaky  Una Probadita Oriental  live"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

        </div>
    </div>


    <?php include './php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="./js/nosotros.js"></script>
</body>

</html>