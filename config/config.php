<?php
define("KEY_TOKEN", "*2023.niyaky-tzuca$.");
define("MONEDA", "$");

// configuracion para paypal
define("CLIENT_ID", "Aa_fMiNKkh8bw2RLQ6uGl5bETWfR9kyYNN6Pa7D6zEt_3jvzSuHrNvLqg__UXaRBRJB45WTaCouF9cTp");
define("CURRENCY", "MXN");

session_start();

$num_cart = 0;
//verifica si existe la variable 
if (isset($_SESSION['carrito']['productos'])) {
    //si existe cuentala
    $num_cart = count($_SESSION['carrito']['productos']);
}
