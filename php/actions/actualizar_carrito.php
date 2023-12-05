<?php
require '../includes/db_connect.php'; 
require '../../config/config.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    //verifica que accion es 
    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0; //si contiene algo cantidad o no
        $respuesta = add($id, $cantidad);

        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }

        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else if ($action == 'eliminar') {
        $datos['ok'] = delate($id);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos); //regresa la peticion de AJAX de checkout.php

function add($id, $cantidad)
{
    $res = 0;

    if ($id > 0 && $cantidad > 0 && is_numeric(($cantidad))) {
        //verifica si exite el id del producto en la variable de session['carrito']
        if (isset($_SESSION['carrito']['productos'][$id])) {
            global $pdo; // Accede a la variable $pdo del ámbito global
            $_SESSION['carrito']['productos'][$id] = $cantidad;
            $query = $pdo->prepare("SELECT precio FROM menu WHERE id_menu= ? LIMIT 1");
            $query->execute([$id]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];

            $res = $cantidad * $precio;

            return $res;

        }
    }else{
        return $res;
    }
}

function delate($id)
{
    if ($id > 0) {
        //valida que exita el id en la sesion
        if (isset($_SESSION['carrito']['productos'][$id])) {
            unset($_SESSION['carrito']['productos'][$id]); //elimina el indice de la variable carrito 
            return true;
        }
    } else {
        return false;
    }
}
?>