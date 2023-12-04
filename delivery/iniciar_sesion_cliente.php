<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/images/niyaky.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion Niyaky</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../css/iniciar_sesion_cliente.css">

</head>

<body>
    <?php include '../php/partials/header_login.php'; ?>

    <div class="container mt-5">
        <div class="row" style="margin-top: 80px !important; margin-bottom: 80px;">
            <!-- Columna para la Imagen -->
            <div class="col-md-6">
                <img style="border-radius: 15px;"
                    src="https://scontent.fmex4-1.fna.fbcdn.net/v/t39.30808-6/341780526_742985920889196_7922071610136543929_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=v-mI70H5QT8AX_7BZd1&_nc_ht=scontent.fmex4-1.fna&oh=00_AfApyuKsiKdhoVkPH9fuKLhfLoldL8xYKSpJlJVFw3Ii8Q&oe=6571C4AB"
                    class="img-fluid" alt="Imagen Descriptiva">
            </div>

            <!-- Columna para el Formulario -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="errorMessage" class="alert alert-danger" style="display:none;">
                            <button type="button" class="close" aria-label="Close" onclick="$('#errorMessage').hide();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <span id="errorText"></span>
                        </div>

                        <form id="loginForm" method="post" action="../php/actions/validar_cliente.php">
                            <h3 class="text-center">Iniciar Sesión</h3>
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye" id="passwordIcon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="submitButton">
                                Iniciar Sesión
                                <div id="loadingSpinner" class="spinner-border text-light" role="status"
                                    style="display: none;">
                                    <span class="sr-only">Cargando...</span>
                                </div>
                            </button>

                            <p class="mt-3 text-center">
                                ¿No tienes cuenta? <a href="./formulario.php" class="sin-decoracion">Regístrate</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include '../php/partials/footer.php'; ?>

    <!-- JS y Popper.js de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (!email || !password) {
                alert("Por favor, rellene todos los campos.");
                event.preventDefault();
            } else {
                // Aquí puedes añadir más validaciones o enviar el formulario.
            }
        });

        document.getElementById('togglePassword').addEventListener('click', function (e) {
            // Toggle entre mostrar y ocultar la contraseña
            const password = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            if (password.type === 'password') {
                password.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        });

        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault(); // Evitar el envío del formulario de forma predeterminada

                // Deshabilitar botón y mostrar spinner
                $('#submitButton').prop('disabled', true);
                $('#loadingSpinner').show();

                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    url: '../php/actions/validar_cliente.php',
                    type: 'post',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function (response) {
                        // Habilitar botón y ocultar spinner
                        $('#submitButton').prop('disabled', false);
                        $('#loadingSpinner').hide();

                        if (response.success) {
                            window.location.href = 'pedir.php';
                        } else {
                            $('#errorText').text(response.message);
                            $('#errorMessage').show();
                        }
                    },
                    error: function () {
                        // Habilitar botón y ocultar spinner
                        $('#submitButton').prop('disabled', false);
                        $('#loadingSpinner').hide();
                        alert("Ocurrió un error al procesar la solicitud.");
                    }
                });
            });
        });





    </script>

</body>

</html>