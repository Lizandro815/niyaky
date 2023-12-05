<?php
// Incluye el archivo de conexión a la base de datos
require '../php/includes/db_connect.php';
require '../config/config.php';
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$list_cart = array();

//verifica que haya algo en la session del carrito
if ($productos != null) {
    //$clave, id del producto
    foreach ($productos as $clave => $cantidad) {
        $query = $pdo->prepare("SELECT id_menu, id_categoria, nombre, descripcion, precio, $cantidad as cantidad FROM menu WHERE id_menu = ?");
        $query->execute([$clave]);
        $list_cart[] = $query->fetch(PDO::FETCH_ASSOC); //trae producto por producto


    }
    $query = $pdo -> prepare("SELECT id_direccion, id_cliente, direccion, latitud, longitud FROM direccion_envios WHERE id_cliente=1");
    $query -> execute();
    $row = $query->fetch(PDO::FETCH_ASSOC); 
} else {
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../css/pedir.css">

</head>

<body>

    
    <?php
    include '../php/partials/header_pedir.php';
    ?>
    <div class="site-container">
        <main>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
    
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($list_cart == null) {
                                echo '<tr><td colspan="5" class="text-center">
                               <img src="../assets/images/carrito_vacio.png" alt="Carrito Vacío" width="100">
                               <br><b>Carrito vacío :(</b>
                             </td></tr>';
                            } else {
                                $total = 0;
                                foreach ($list_cart as $producto) {
                                    $_id = $producto['id_menu'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio'];
                                    $cantidad = $producto['cantidad'];
                                    $subtotal = $cantidad * $precio;
                                    $total += $subtotal;
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $nombre; ?>
                                        </td>
    
                                        <td>
                                            <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
                                        </td>
    
                                        <td>
                                            <input type="number" min="1" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_" <?php echo $_id; ?> onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
    
                                        </td>
                                        <td>
                                            <div id="subtotal_<?php echo $_id ?>" name="subtotal[]">
                                                <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                            </div>
                                        </td>
                                        <td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"><i class="fas fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">
                                        <p class="h5" id="total">
                                            <?php echo MONEDA . number_format($total, 2, '.', ',') ?>
                                        </p>
                                    </td>
                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
                <?php if ($list_cart != null) { ?>
                    <div class="row mb-4">
                        <div class="col">
                        <div class="col-md-9">
                           <h5>Direccion de entrega:</h5>
                        </div>
                        <div class="col-md-3 offset-md-9  mt-4">
                            <?php if (!isset($_SESSION['user_id'])) { ?>
                                <a href="pago_carrito.php" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#iniciarSesionModal">Realizar pago <i class="fas fa-solid fa-credit-card"></i></a>
                            <?php } else { ?>
                                <a href="pago_carrito.php" class="btn btn-danger btn-lg" style="background-color: orangered !important;">Realizar pago <i class="fas fa-solid fa-credit-card"></i></a>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
        <!--MODAL ELIMINAR-->
        <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminaModalLabel">Eliminar producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Eliminar producto del carrito?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                        <button id="btnElimina" type="button" class="btn btn-danger" onclick="eliminarProd()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../php/partials/footer.php'; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        let eliminaModal = document.getElementById('eliminaModal');
        eliminaModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget; //trae los datos que tiene el vinculo (data-bs-id)
            let id = button.getAttribute('data-bs-id'); //id que se envia con el boton
            let btnElimina = eliminaModal.querySelector('.modal-footer #btnElimina');
            btnElimina.value = id;
        })

        function eliminarProd() {
            let btnElimina = document.getElementById('btnElimina');
            let id = btnElimina.value;

            let url = '../php/actions/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('action', 'eliminar');

            fetch(url, {
                    method: 'post',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload(); //actualiza la ventana
                    }
                })
        }

        function actualizaCantidad(cantidad, id) {
            let url = '../php/actions/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('cantidad', cantidad);
            formData.append('action', 'agregar');

            fetch(url, {
                    method: 'post',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let divsubtotal = document.getElementById("subtotal_" + id);
                        divsubtotal.innerHTML = data.sub;

                        let total = 0.00;
                        let listProd = document.getElementsByName('subtotal[]');

                        for (let i = 0; i < listProd.length; i++) {
                            total += parseFloat(listProd[i].innerHTML.replace(/[$,]/g, ''));
                            //en el replace se elimina el signo "$" y la "," de cada producto para poder hacer la suma total de la compra
                        }

                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA ?>' + total;
                    }
                })
        }
    </script>
</body>

</html>