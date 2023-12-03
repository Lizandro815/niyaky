<?php
require '../includes/db_connect.php'; 
require '../../vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$bucketName = 'bucket_niyaky';
$keyFilePath = '../../credenciales.json';
$storage = new StorageClient(['keyFilePath' => $keyFilePath]);
$bucket = $storage->bucket($bucketName);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = array();

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
    $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_INT);

    $pdo->beginTransaction();

    try {
        // 1. Agregar platillo al menú
        $stmt = $pdo->prepare("INSERT INTO menu (id_categoria, nombre, descripcion, precio, agregado_el) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$id_categoria, $nombre, $descripcion, $precio]);
        $last_id_menu = $pdo->lastInsertId();

        // 2. Subir imágenes al bucket y guardar URLs en la base de datos
        if (isset($_FILES["imagenes"])) {
            foreach ($_FILES["imagenes"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["imagenes"]["tmp_name"][$key];
                    $filename = basename($_FILES["imagenes"]["name"][$key]);
                    $filePathInBucket = "Menu/" . $nombre . "_" . $last_id_menu . "/" . $filename;

                    $source = fopen($tmp_name, 'r');
                    $bucket->upload($source, ['name' => $filePathInBucket]);

                    $object = $bucket->object($filePathInBucket);
                    $object->update([], ['predefinedAcl' => 'publicRead']);

                    $urlImagen = "https://storage.googleapis.com/" . $bucketName . "/" . $filePathInBucket;

                    // Insertar URL de la imagen en la tabla menu_imagenes
                    $stmt = $pdo->prepare("INSERT INTO menu_imagenes (id_menu, url_imagen) VALUES (?, ?)");
                    $stmt->execute([$last_id_menu, $urlImagen]);
                }
            }
        }

        $pdo->commit();
        $response['success'] = true;
        $response['message'] = "Platillo agregado con éxito!";
    } catch (Exception $e) {
        $pdo->rollback();
        $response['success'] = false;
        $response['message'] = "Error al agregar el platillo: " . $e->getMessage();
    }

    echo json_encode($response);
}
?>

?>

