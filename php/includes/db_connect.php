<?php
 
$host = 'containers-us-west-138.railway.app';  // reemplaza 'tu_hostname' con el proporcionado por Railway
$db   = 'railway'; // reemplaza 'tu_nombre_db' con el nombre de tu base de datos
$user = 'root';   // reemplaza 'tu_usuario' con tu usuario de la base de datos
$pass = '31QR6UUIq2QOUA0SYrIs'; // reemplaza 'tu_contraseña' con tu contraseña de la base de datos
$port = 6943; // reemplaza 3306 si Railway te proporcionó un puerto diferente

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
