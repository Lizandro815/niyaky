<?php
// Inicia la sesión al principio de tu documento
session_start();

// Si la sesión user_id no está configurada, redirige al usuario a la página de inicio
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Incluye tu archivo de conexión a la base de datos
require '../php/includes/db_connect.php';

// Verificamos que user_id esté seteado
if(isset($_SESSION['user_id'])) {
    try {
        // Preparamos la consulta
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);

        // Ejecutamos la consulta
        $stmt->execute();

        // Obtenemos el resultado
        $cliente = $stmt->fetch();

    } catch (PDOException $e) {
        die("Error al realizar la consulta: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
        <!-- CSS de Font Awesome para íconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .perfil {
            border-bottom: 2px solid orange;
            /* Cambia '2px' si deseas un grosor diferente para la línea */
            padding-bottom: 5px;
            /* Añade un poco de espacio debajo del texto y la línea */
        }

        @media only screen and (max-width: 767px) {
            .redes {
                margin-top: 10px !important;

            }

            .nameuser {
                display: none !important;
            }

            .perfil {
                width: 25% !important;
            }

        }
    </style>
</head>



<body>
    
    <?php
// Asegúrate de que esta línea está después de tu consulta a la base de datos y la asignación a $cliente
$imgSrc = isset($cliente['url_foto_perfil']) && !empty($cliente['url_foto_perfil']) ? htmlspecialchars($cliente['url_foto_perfil']) : '../assets/images/perfil.png';
?>


<form id="logoutForm" method="post" action="../php/actions/cerrar_sesiones.php" style="display: none;">
    <input type="hidden" name="destroy_session" value="1">
</form>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                    <img src="<?php echo $imgSrc; ?>" class="img-fluid rounded-circle" style="width: 100px; height: 100px;" alt="Foto de usuario">
                    </div>
                   
                    <div class="ms-3">
                        <h5>
                            <?php echo isset($cliente['nombres']) ? htmlspecialchars($cliente['nombres']) : 'Nombre por defecto'; ?>
                        </h5>
                        <p>
                            <?php echo isset($cliente['correo']) ? htmlspecialchars($cliente['correo']) : 'correo@defecto.com'; ?>
                        </p>
                    </div>
                </div>

                
                <ul class="list-group list-group-flush">
                    <a  class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-person"></i> Información de la cuenta</span>
                        <span>&gt;</span>
                    </a>
                    <a  class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-truck"></i> Direcciones de envío</span>
                        <span>&gt;</span>
                    </a>
                    <a  class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-lock"></i> Seguridad</span>
                        <span>&gt;</span>
                    </a>
                    <a  class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-shield-lock"></i> Privacidad</span>
                        <span>&gt;</span>
                    </a>
                    <a class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-journal"></i> Contactenos</span>
                        <span>&gt;</span>
                    </a>
                    <a  class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-clipboard"></i> Reclamos</span>
                        <span>&gt;</span>
                    </a>
                    <a  id="logoutLink" 
                        class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-box-arrow-left"></i> Cerrar sesión</span>
                        <span>&gt;</span>
                    </a>


                </ul>
            </div>
        </div <!-- Estilos adicionales para ampliar el ancho de cada sección de la lista -->
        <style>
            .list-group-item {
                padding: 20px 15px;
                cursor: pointer;
            }
            .custom-footer{
                margin-top: 100px;
                width: 100% !important;
            }
        </style>
    </div>

<?php include '../php/partials/footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

        <script>
            document.getElementById('logoutLink').addEventListener('click', function (event) {
                event.preventDefault();  // Evita que el enlace haga su comportamiento por defecto
                document.getElementById('logoutForm').submit();
            });
        </script>

</body>

</html>