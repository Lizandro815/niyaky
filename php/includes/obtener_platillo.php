<?php
require './db_connect.php';

if (isset($_GET['id'])) {
    $platilloId = $_GET['id'];

    // Preparar el array que contendrá los datos del platillo
    $resultado = [];

    try {
        // Obtener detalles del platillo
        $stmt = $pdo->prepare("SELECT id_menu, nombre, descripcion, precio FROM menu WHERE id_menu = ?");
        $stmt->execute([$platilloId]);
        $resultado['platillo'] = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró el platillo
        if ($resultado['platillo']) {
            // Obtener las imágenes asociadas al platillo
            $stmt = $pdo->prepare("SELECT url_imagen FROM menu_imagenes WHERE id_menu = ?");
            $stmt->execute([$platilloId]);
            $imagenes = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Añadir imágenes al resultado
            $resultado['imagenes'] = $imagenes;
        } else {
            // En caso de que no se encuentre el platillo
            $resultado['error'] = "Platillo no encontrado.";
        }

    } catch (PDOException $e) {
        $resultado['error'] = "Error en la consulta a la base de datos: " . $e->getMessage();
    }

    // Devolver el resultado como JSON
    header('Content-Type: application/json');
    echo json_encode($resultado);
}
?>
