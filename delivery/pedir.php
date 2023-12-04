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
                <img src="https://tofuu.getjusto.com/orioneat-local/resized2/JqcLGKGZmPaJTN5eC-x-1600.webp"
                    class="d-block w-100" alt="Descripción de la imagen 1">

            </div>
            <!-- Segundo slide -->
            <div class="carousel-item">
                <img src="https://tofuu.getjusto.com/orioneat-local/resized2/upcs4ktn2QzS94tmq-x-1600.webp"
                    class="d-block w-100" alt="Descripción de la imagen 2">

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
        <?php if (!empty($platillos)): ?>
        <h2>Menú</h2>
        <div class="row">
            <?php foreach ($platillos as $platillo): ?>
            <!-- Tarjetas de platillos -->
            <div class="col-sm-6 col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card h-100">
                    <?php if ($platillo['url_imagen']): ?>
                    <img src="<?php echo htmlspecialchars($platillo['url_imagen']); ?>" class="card-img-top"
                        alt="<?php echo htmlspecialchars($platillo['nombre']); ?>">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <?php echo strtoupper(htmlspecialchars($platillo['nombre'])); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($platillo['descripcion']); ?>
                        </p>
                        <p class="card-text mt-auto">$
                            <?php echo htmlspecialchars(number_format($platillo['precio'], 2)); ?>
                        </p>
                        <!-- Dentro de tu bucle foreach para platillos -->
                        <a href="#" class="btn btn-primary mt-2 btn-agregar" data-toggle="modal"
                            data-target="#platilloModal" data-platillo-id="<?php echo $platillo['id_menu']; ?>"
                            style="background-color: orangered !important; border: none;">Agregar</a>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Mensaje de 'No se encontraron resultados' -->
        <div class="text-center">
            <img src="../assets/images/no_resultados.png" alt="No se encontraron resultados" class="mx-auto">
            <p class="mt-3" style="font-weight: 600; font-size: 18px; color: black;">No se encontraron resultados</p>
        </div>
        <?php endif; ?>
    </div>

    <!-- Modal para Platillo -->
    <div class="modal fade" id="platilloModal" tabindex="-1" role="dialog" aria-labelledby="platilloModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="platilloModalLabel">Detalles del Platillo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Elemento de Carga (GIF) -->
                    <div id="loadingImage" class="text-center">
                        <img src="../assets/images/loading.gif" alt="Cargando..." />
                    </div>


                    <!-- Contenido del Modal -->
                    <div id="modalContent" style="display: none;">
                        <div id="carouselPlatilloImages" class="carousel slide" data-ride="carousel">
                            <!-- Carrusel de Imágenes -->
                            <div class="carousel-inner" id="carouselInner">
                                <!-- Aquí se añadirán los ítems del carrusel dinámicamente -->
                            </div>
                            <a class="carousel-control-prev" href="#carouselPlatilloImages" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselPlatilloImages" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                        <div class="mt-3">
                            <p class="platillo-descripcion"></p>
                            <p class="platillo-precio"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="fo-modal">

                    <input  id="platilloIdInput">
                    <div class="input-group mr-2" id="seccionCantidad" style="display: none;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cantidad</span>
                        </div>
                        <input type="number" id="cantidadPlatillo" class="form-control" value="1" min="1">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAgregarOrden" style="display: none;">Agregar al
                        carrito</button>
                </div>
            </div>
        </div>
    </div>



    <?php include '../php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Evento cuando el modal se cierra
        $('#platilloModal').on('hidden.bs.modal', function () {
            // Limpiar el contenido del modal
            var carouselInner = document.getElementById('carouselInner');
            carouselInner.innerHTML = ''; // Limpiar el carrusel

            document.getElementById('platilloModalLabel').textContent = '';
            document.querySelector('.platillo-descripcion').textContent = '';
            document.querySelector('.platillo-precio').textContent = '';
            $("#loadingImage").show();
            $("#modalContent").hide();
            $('#seccionCantidad').hide();
            $('#btnAgregarOrden').hide();
        });

        $('#platilloModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var platilloId = button.data('platillo-id'); // Extraer info del atributo data-*

            $('#platilloIdInput').val(platilloId);

            // Mostrar el GIF de carga y ocultar el contenido
            $("#loadingImage").show();
            $("#modalContent").hide();


            // Llamada AJAX para obtener los detalles del platillo
            $.ajax({
                url: '../php/includes/obtener_platillo.php', // URL al script PHP que devuelve los detalles del platillo
                method: 'GET',
                data: { id: platilloId },
                success: function (response) {
                    // Actualizar el contenido del modal con los datos del platillo
                    if (response && response.platillo) {
                        actualizarModalConDatosDelPlatillo(response);
                        $("#loadingImage").hide();
                        $("#modalContent").show();
                        $('#seccionCantidad').show();
                        $('#btnAgregarOrden').show();

                    } else {
                        console.error('No se pudo obtener la información del platillo');
                        // Aquí podrías manejar el caso de error
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX: ', textStatus, errorThrown);
                    // Aquí podrías manejar el caso de error en la solicitud AJAX
                }
            });
        });

        function actualizarModalConDatosDelPlatillo(data) {
            // Aquí actualizas el contenido del modal con la respuesta
            var carouselInner = document.getElementById('carouselInner');
            carouselInner.innerHTML = ''; // Limpiar el carrusel

            // Añadir imágenes al carrusel
            data.imagenes.forEach(function (url, index) {
                var div = document.createElement('div');
                div.className = 'carousel-item' + (index === 0 ? ' active' : '');
                var img = document.createElement('img');
                img.className = 'd-block w-100';
                img.src = url;
                div.appendChild(img);
                carouselInner.appendChild(div);
                $('#cantidadPlatillo').val('1');
            });

            // Actualizar nombre, descripción y precio del platillo
            document.getElementById('platilloModalLabel').textContent = data.platillo.nombre.toUpperCase();
            document.querySelector('.platillo-descripcion').textContent = data.platillo.descripcion;
            document.querySelector('.platillo-precio').textContent = 'Precio: $' + data.platillo.precio;
        }
    </script>


</body>

</html>