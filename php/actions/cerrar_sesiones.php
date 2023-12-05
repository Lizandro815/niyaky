<?php
if (isset($_POST['destroy_session'])) {
    session_start();
    session_destroy();
    header("Location: ../../delivery/pedir.php");  // Reemplaza 'tu_archivo_actual.php' con el nombre de tu archivo PHP actual
    exit();
}
?>
