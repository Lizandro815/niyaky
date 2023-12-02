<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="./css/contacto.css">
</head>

<body>

    <?php
    include 'php/partials/header.php'; 
    ?>

    <div class="hero-section">
        <h1>¡Bienvenido a Nuestro Sitio!</h1>
    </div>


    <div class="container-fluid info-cont">
        <div class="container mt-5 infoadd">
            <h2 class="text-center text-danger mb-5">Visitanos</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-uppercase mb-3">Restaurante</h4>
                    <address>
                        Tzucacab, Yucatán<br>
                        Calle 25 entre 26 y 28<br>
                        Colonia Centro
                    </address>
                </div>
                <div class="col-md-4">
                    <h4 class="text-uppercase mb-3">Horarios</h4>
                    Viernes — Sabado: 12PM — 4PM<br>
                    Domingo: 12PM — 4PM
                </div>
                <div class="col-md-4">
                    <h4 class="text-uppercase mb-3">Telefono</h4>
                    <span class="phone-number">📞 997 133 0471</span>
                </div>
            </div>
        </div>
        <div class="container-main">
            <div class="container mt-5 formulario">
                <div class="row">
                    <!-- Columna para la imagen -->
                    <div class="col-md-6">
                        <img src="./assets/images/bas.jpg" alt="Sushi" class="img-fluid">
                    </div>

                    <!-- Columna para el formulario -->
                    <div class="col-md-6">
                        <h2 class="text-center text-danger mb-5">!Nos importa tu opinión!</h2>
                        <p class="mb-4"> Si quieres darnos una idea, contarnos algo o simplemente saludar, ¡usa este
                            formulario! Estamos aquí para escucharte y te responderemos lo mas pronto posible.
                        </p>
                        <p><strong>Email:</strong> <a href="mailto:casitaniyaky@gmail.com">casitaniyaky@gmail.com</a>
                        </p>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tu nombre">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Tu numero o correo">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Asunto">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="message" rows="4" placeholder="Mensaje"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Enviar mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <?php include './php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>