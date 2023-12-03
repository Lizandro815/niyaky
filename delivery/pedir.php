<?php
// Incluye el archivo de conexión a la base de datos
require '../php/includes/db_connect.php';

// Comienza a construir la consulta
$query = "SELECT m.id_menu, m.nombre, m.descripcion, m.precio, 
    (SELECT mi.url_imagen FROM menu_imagenes mi WHERE mi.id_menu = m.id_menu LIMIT 1) as url_imagen 
    FROM menu m";

// Array para los parámetros de la consulta
$params = [];

// Verifica si se enviaron filtros y añádelos a la consulta
$whereParts = [];
if (isset($_GET['nombre']) && $_GET['nombre'] != '') {
    $whereParts[] = "m.nombre LIKE ?";
    $params[] = '%' . $_GET['nombre'] . '%';
}
if (isset($_GET['categoria']) && $_GET['categoria'] != '') {
    $whereParts[] = "m.id_categoria = ?";
    $params[] = $_GET['categoria'];
}

// Si hay partes del WHERE, las une y las añade a la consulta
if (count($whereParts) > 0) {
    $query .= " WHERE " . implode(' AND ', $whereParts);
}

// Añade el GROUP BY al final de la consulta
$query .= " GROUP BY m.id_menu";

// Prepara y ejecuta la consulta
try {
    $platillos = [];
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    while ($row = $stmt->fetch()) {
        $platillos[] = $row;
    }
} catch (PDOException $e) {
    die("No se pudieron obtener los platillos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/images/niyaky.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niyaky</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../css/pedir.css">

</head>

<body>
    <?php
        include '../php/partials/header_pedir.php'; 
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
                <img src="https://tofuu.getjusto.com/orioneat-local/resized2/JqcLGKGZmPaJTN5eC-x-1600.webp" class="d-block w-100" alt="Descripción de la imagen 1">

            </div>
            <!-- Segundo slide -->
            <div class="carousel-item">
                <img src="https://tofuu.getjusto.com/orioneat-local/resized2/upcs4ktn2QzS94tmq-x-1600.webp" class="d-block w-100" alt="Descripción de la imagen 2">

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

    <div class="container mt-5">
        <h2>Menú</h2>
        <div class="row">
            <?php foreach ($platillos as $platillo): ?>
                <!-- Añade 'col-sm-6' para dos tarjetas por fila en vistas móviles -->
                <div class="col-sm-6 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card h-100">
                        <?php if ($platillo['url_imagen']): ?>
                            <img src="<?php echo htmlspecialchars($platillo['url_imagen']); ?>" class="card-img-top"
                                 alt="<?php echo htmlspecialchars($platillo['nombre']); ?>">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?php echo htmlspecialchars($platillo['nombre']); ?>
                            </h5>
                            <p class="card-text">
                                <?php echo htmlspecialchars($platillo['descripcion']); ?>
                            </p>
                            <p class="card-text mt-auto">$
                                <?php echo htmlspecialchars(number_format($platillo['precio'], 2)); ?>
                            </p>
                            <a href="#" class="btn btn-primary mt-2">Agregar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php include '../php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>