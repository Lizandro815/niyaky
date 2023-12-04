<?php
require '../includes/db_connect.php';

header('Content-Type: application/json'); // Indicar que la respuesta es JSON

$response = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if (!$email || !$password) {
        $response['success'] = false;
        $response['message'] = "Correo electrónico o contraseña no proporcionados.";
    } else {
        $stmt = $pdo->prepare("SELECT id_cliente, contraseña FROM clientes WHERE correo = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['contraseña'])) {
            session_start();
            $_SESSION['id_cliente'] = $user['id_cliente'];
            $_SESSION['correo'] = $email;

            $response['success'] = true;
            $response['message'] = "Inicio de sesión exitoso.";
        } else {
            $response['success'] = false;
            $response['message'] = "Correo electrónico o contraseña incorrectos.";
        }
    }
    echo json_encode($response);
} else {
    $response['success'] = false;
    $response['message'] = "Método de solicitud inválido.";
    echo json_encode($response);
}
?>
