<?php
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
} else {
    header("Location: pedir.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago carrito</title>
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

    <main>
        <div class="container mt-3 ">

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <h4>Detalles de pago</h4>

                    <div class="table-responsive my-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($list_cart == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>Carrito vacio</b></td></tr>';
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
                                                <div id="subtotal_<?php echo $_id ?>" name="subtotal[]">
                                                    <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2">
                                            <p class="h5 text-end me-5" id="total">
                                                <?php echo MONEDA . number_format($total, 2, '.', ',') ?>
                                            </p>
                                        </td>
                                    </tr>

                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 mt-3">
                    <h5>Seleccione un metodo de pago: </h5>
                    <div class="mt-3" id="paypal-button-container"></div>
                </div>

            </div>
        </div>
    </main>
    <?php include '../php/partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>">
        //Sdk javaScript paypal
    </script>

    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                label: 'pay'
            },
            //Valor a pagar 
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },
            //cuando se realize el pago
            onApprove: function(data, actions) {
                let url = '../php/actions/captura_pago.php';
                //la variable detalles contendra todo lo que pase en el pago
                actions.order.capture().then(function(detalles) {
                    console.log(detalles);

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            //enviamos la informacion
                            detalles: detalles
                        })
                    }).then(function(response) {
                        //window.location.href = "pago_finalizado.php?key=" + detalles['id'];

                    });
                });
            },
            //cuando se cancele el pago
            onCancel: function(data) {
                alert("Pago cancelado")
            }
        }).render('#paypal-button-container')
    </script>
</body>

</html>