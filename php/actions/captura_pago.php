<?php
require '../../config/config.php';
require '../includes/db_connect.php'; 

//captura todo lo que se le envio desde pago.php
$json = file_get_contents('php://input');
$datos = json_decode($json, true); //procesamiento
echo '<pre>';
print_r($datos);
echo '</pre>';
if (is_array($datos)) {
    
}
?>