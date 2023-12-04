<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Incluyendo Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .input-group {
            margin-bottom: 1em;
        }
        .invalid-feedback {
            position: absolute;
            bottom: -20px;
            /* Ajusta según sea necesario */
            left: 0;
            display: none;
            /* Inicialmente oculto */
            color: red;
            font-size: 0.8em;
        }
        .form-group {
            position: relative;
            margin-bottom: 30px;
            /* Aumenta el espacio para acomodar el mensaje de error */
        }
    </style>

</head>

<body>
    <?php include '../php/partials/header_nueva_cuenta.php'; ?>

    <div class="container mt-5" style="margin-bottom: 40px;">
        <h2>Registro de Usuario</h2>
        <form  method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" name="correo"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Contraseña:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña"
                        name="contraseña" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePwd"><i
                                class="fa fa-eye"></i></button>
                    </div>
                </div>
                <div class="invalid-feedback">Mensaje de error para la contraseña</div>
            </div>
            <div class="form-group">
                <label for="confirmPwd">Confirmar Contraseña:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPwd" placeholder="Confirma tu contraseña"
                        name="confirmPwd" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPwd"><i
                                class="fa fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nombres:</label>
                <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre" name="nombres" required>
            </div>
            <div class="form-group">
                <label for="surname">Apellidos:</label>
                <input type="text" class="form-control" id="surname" placeholder="Ingresa tus apellidos" name="apellidos"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" class="form-control" id="phone" placeholder="Ingresa tu número de teléfono" name="telefono">
            </div>
            <div class="form-group">
                <label for="profileImage">Foto de Perfil (opcional):</label>
                <input type="file" class="form-control-file" id="profileImage" name="foto_perfil">
            </div>
            <button type="submit" class="btn btn-primary" id="submitButton">
                Registrarse
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loadingIcon"
                    style="display:none;"></span>
            </button>

        </form>
    </div>

    <?php include '../php/partials/footer.php'; ?>

    <!-- Incluyendo Bootstrap JS y jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/validar.js"></script>
</body>

</html>