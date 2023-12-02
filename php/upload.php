<?php
require '../vendor/autoload.php'; // Asegúrate de tener esto si estás usando Composer

use Google\Cloud\Storage\StorageClient;

$bucketName = 'bucket_niyaky';
$keyFilePath = '../credenciales.json'; // Cambia esto a la ruta de tu archivo de credenciales

if (isset($_POST["submit"])) {
    // Configura el cliente de GCS
    $storage = new StorageClient([
        'keyFilePath' => $keyFilePath
    ]);
    $bucket = $storage->bucket($bucketName);

    // Subir el archivo
    $filename = $_FILES["fileToUpload"]["name"];
    $source = fopen($_FILES["fileToUpload"]["tmp_name"], 'r');
    $bucket->upload($source, ['name' => $filename]);

    // Hacer el objeto público si estás utilizando el control de acceso "Preciso"
    $object = $bucket->object($filename);
    $object->update([], ['predefinedAcl' => 'PUBLICREAD']);

    echo "¡Archivo $filename subido con éxito!";
} else {
    echo "Error al subir el archivo.";
}
?>
