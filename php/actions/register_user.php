<?php
require '../includes/db_connect.php'; 
require '../../vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;
use \MailerLiteApi\MailerLite;

$mailerLiteApiKey = 'TU_API_KEY';
$mailerLiteApi = new MailerLite($mailerLiteApiKey);

$bucketName = 'bucket_niyaky';
$keyFilePath = '../../credenciales.json';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = array();

    $email = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'contraseña');
    $name = filter_input(INPUT_POST, 'nombres', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);

    $stmt = $pdo->prepare("SELECT id_cliente FROM clientes WHERE correo = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $response['success'] = false;
        $response['message'] = "El correo ya está en uso.";
        echo json_encode($response);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $pdo->beginTransaction();

    try {
        // 1. Registrar el cliente en la base de datos
        $stmt = $pdo->prepare("INSERT INTO clientes (nombres, apellidos, correo, contraseña, telefono, creado_el) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $surname, $email, $hashedPassword, $phone]);
        $last_id = $pdo->lastInsertId();

        // 2. Subir la imagen de perfil al bucket si fue proporcionada
        $filePathInBucket = null;
        if (isset($_FILES["foto_perfil"]) && $_FILES["foto_perfil"]["error"] == 0) {
            $storage = new StorageClient(['keyFilePath' => $keyFilePath]);
            $bucket = $storage->bucket($bucketName);

            $folderName = $name . "_" . $last_id . "/";
            $filename = $folderName . basename($_FILES["foto_perfil"]["name"]);
            
            $source = fopen($_FILES["foto_perfil"]["tmp_name"], 'r');
            $bucket->upload($source, ['name' => $filename]);

            $object = $bucket->object($filename);
            $object->update([], ['predefinedAcl' => 'PUBLICREAD']);

            $filePathInBucket = "https://storage.googleapis.com/" . $bucketName . "/" . $filename;
        }

        if ($filePathInBucket) {
            // Reemplazar 'gs://' por 'https://storage.googleapis.com/' en la URL
            $modifiedUrl = str_replace('gs://', 'https://storage.googleapis.com/', $filePathInBucket);
        
            // Preparar y ejecutar la consulta SQL con la URL modificada
            $stmt = $pdo->prepare("UPDATE clientes SET url_foto_perfil = ? WHERE id_cliente = ?");
            $stmt->execute([$modifiedUrl, $last_id]);
        }
        

        // 3. Crear el suscriptor en MailerLite
        $subscribersApi = $mailerLiteApi->subscribers();
        $newSubscriber = [
            'email' => $email,
            'fields' => [
                'name' => $name,
                'surname' => $surname,
                'phone' => $phone
            ]
        ];

        $addedSubscriber = $subscribersApi->create($newSubscriber);
        if (!$addedSubscriber) {
            throw new Exception("Error al agregar el suscriptor $email a MailerLite.");
        }

        // 4. Agregar el suscriptor al grupo "users" en MailerLite
        $groupsApi = $mailerLiteApi->groups();
        $groupId = 102858886253381168;  // Reemplaza con el ID de tu grupo "clientes" en MailerLite
        $groupsApi->addSubscriber($groupId, $newSubscriber);

        $pdo->commit();
        $response['success'] = true;
        $response['message'] = "Usuario registrado con éxito!";
        echo json_encode($response);
    } catch (Exception $e) {
        $pdo->rollback();
        $response['success'] = false;
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>
