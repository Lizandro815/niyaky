<?php
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

// Configuración del servidor
$mail->SMTPDebug = 2;  // Habilita el modo de debug (0 para apagarlo, 2 para mensajes detallados)
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tu_email@gmail.com';  // Tu dirección de Gmail
$mail->Password = 'tu_password';  // Tu contraseña de Gmail
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiZDVhMDAxNzk4YmY1MGVhOGNjODZkY2MxNTFiZDY0YzI2NjE0OGMzZmE4NGY5NGI0ZTA5ODc0ZDg0NjlmNTFjYzk3MGE2MmI3OTA2YjQ4NjciLCJpYXQiOjE2OTgwOTI2NzcuMzUxMjQ4LCJuYmYiOjE2OTgwOTI2NzcuMzUxMjQ5LCJleHAiOjQ4NTM3NjYyNzcuMzQ2MjA1LCJzdWIiOiI2ODI4ODAiLCJzY29wZXMiOltdfQ.G4wBvdT3Lsfsjj-iEdmlnG4QHFZXaR0ShH0uchDB0xkIhsyc2u08j79ROWANbl7H-NroFGwkDQ3UEB3MFpzNejz32MHDO2Ck-1_ck5REd7OZRdcH5uYMIQbKgB9xLfh2WqusEugL2e2w7nfO4U1TeQlBMa5turGgB8bO6uDEYQTGXXeQ_bd8qXtBiQp0bwcZaC3GreySGP75W_mVUl8Mj3FfDaDT3zfH7MnBCC6MmQEi45e8XKELmFeGChvgccsNmi6YxWpB5Uee0WEVyRHfJqRH5p_XuinXiAVhBQ9ikuDOiPqQH72I9P2b3zvh5t_zGLarK7HtUB4wcpfABJx7z_hZkDAXIXZ9jNzWppUIuCI81kxIAgL79-rPIRuGY0mHJK0a0BbQUnBeJm0KAg6wwvSfsrjpRMyzeXKfp399h8KGHsF_mZ1YocjeYJ6bt-aY8aLdCCyvG5JEiiK4p1E92I7wAZ47OrxpIF_SQuI0k6fe0GKC7C4wzoeJQQdqZ4srefk5tQQ3eJjW3idJr7AYAMveoRGxh-P08gyGWl5VIn5rsqgxHKu2kfTKF06Fqc46ByL_bAJ7zvV9UEny0nxgAMNKa_I5yRFulGI_YQT56ZbR3Epk7OhSf090wFIialaOlFJyJ_GMORcK8detYoCphnUy0EIgoy3YpHpz8Zvyzj4';






?>