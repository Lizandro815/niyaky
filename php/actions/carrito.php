<?php
require '../../config/config.php';
if (isset($_POST['platilloId'])) {
    $id = $_POST['platilloId'];
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad']  : 1;
    $token = $_POST['token'];
    
    $tmp_token = hash_hmac('sha1', $id, KEY_TOKEN); //alamcenamos el token original en esta variable
    //verifico que el token mandado por el usuario es igual al token original generado
    //$token == $tmp_token && 
    if ($cantidad > 0 && is_numeric($cantidad)) {
         //verifica si existe el producto y si si le suma uno
         if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] += $cantidad;
        }else{
            $_SESSION['carrito']['productos'][$id] = $cantidad;
            //si no existe le agregara uno al carrito
        }

        $datos ['numero']= count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;

    } else {
        $datos['ok'] = false;
        $datos['ok']="no entre en platillo";
    }
} else {
    $datos['ok'] = false;
    $datos['ok']="no entre";
}
echo json_encode($datos);
?>
