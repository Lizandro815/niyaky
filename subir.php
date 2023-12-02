<?php
require './php/includes/db_connect.php';

$userId = 2; // Aquí puedes especificar el ID del usuario que desees. Por ejemplo, he puesto '1' como un valor hardcodeado.

$stmt = $pdo->prepare("SELECT url_foto_perfil FROM clientes WHERE id_cliente = ?");
$stmt->execute([$userId]);

$user = $stmt->fetch();

// Convierte la URI de Google Cloud Storage a una URL pública
$imgUrl =  $user['url_foto_perfil'];
?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir a Google Cloud Storage</title>
</head>
<body>
    <!-- Muestra la imagen recuperada de la base de datos -->
    <img src="<?php echo $imgUrl; ?>" alt="Foto de perfil" width="200"> <!-- Puedes ajustar el width como desees -->
</body>
</html>
