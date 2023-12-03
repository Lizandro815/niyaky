<?php
require 'php/includes/db_connect.php';  // Asegúrate de que la ruta al archivo es correcta

// Consulta para obtener las categorías
try {
    $stmt = $pdo->query("SELECT id_categoria, nombre FROM categoria");
    $categorias = $stmt->fetchAll();
} catch (PDOException $e) {
    // Manejar el error
    die("No se pudo obtener las categorías: " . $e->getMessage());
}
?>

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


</head>

<body>
    <?php
        include 'php/partials/header.php'; 
    ?>

    <div class="container mt-5">
        <h2>Agregar Producto al Menú</h2>
        <form action="php/actions/agregar_platillo.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="id_categoria">Categoría:</label>
                <select class="form-control" id="id_categoria" name="id_categoria" required>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo htmlspecialchars($categoria['id_categoria']); ?>">
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            
            <div class="form-group">
                <label for="imagenes">Imágenes del Producto:</label>
                <input type="file" class="form-control-file" id="imagenes" name="imagenes[]" multiple>
                <small class="form-text text-muted">Puede seleccionar más de un archivo.</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
        
    </div>

    <?php include './php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>