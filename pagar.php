<?php include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';

/*VALIDACION DEL HEADER DE LA PAGINA PARA IMPEDIR QUE SE ESCRIBA PAGAR.PHP DESDE EL BUSCADOR */
if (isset($_POST['btnaccion'])) {
} else {

    header('Location:shop.php?pagina=1');
}



if (isset($_SESSION['usuario'])) {
} else {

    header('location:login/index.php');
}
/*----*/

$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Biomedical - PAGO</title>
    <?php include 'templates/header.php'; ?>


    <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="home.php">HOME</a></li>
                <li class="active"><a href="shop.php">TIENDA</a></li>
                <li class="has-children">
                    <a href="#">CATEGORIAS</a>
                    <ul class="dropdown">
                        <li><a href="shop_category.php?category=analgesicos&pagina=1">Analgésicos</a></li>
                        <li class=""><a href="shop_category.php?category=antiinflamatorios&pagina=1">Antiinflamatorios</a></li>
                        <li><a href="shop_category.php?category=antibioticos&pagina=1">Antibióticos</a></li>
                        <li><a href="shop_category.php?category=antiparasitario&pagina=1">Antiparasitario</a></li>
                        <li><a href="shop_category.php?category=antiviral&pagina=1">Antiviral</a></li>
                        <li><a href="shop_category.php?category=antihipertensivo&pagina=1">Antihipertensivo</a></li>
                        <li><a href="shop_category.php?category=antialergicos&pagina=1">Antialérgicos</a></li>
                        <li><a href="shop_category.php?category=diureticos&pagina=1">Diuréticos</a></li>
                        <li><a href="shop_category.php?category=protector_gastrico&pagina=1">Protector gástrico</a></li>
                        <li><a href="shop_category.php?category=vitamina&pagina=1">Vitaminas</a></li>
                    </ul>
                </li>
                <li><a href="nosotros.php">NOSOTROS</a></li>
                <li><a href="profile.php"><?php echo $datos_usuario['nombre']; ?></a></li>
                <li><a href="compras.php">COMPRAS</a></li>
            </ul>
        </nav>
    </div>


    <style>
        #iconos {
            position: relative;
            right: 30%;
        }
    </style>


    <div class="icons">
        <a href="#" class="icons-btn d-inline-block js-search-open" id="iconos"><span class="icon-search"></span></a>

        <a href="carrito_compras.php" class="icons-btn d-inline-block bag" id="iconos">
            <span class="icon-shopping-bag"></span>
            <span class="number"><?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                    ?></span>
        </a>
        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>

        <a href="login/salir.php"><img src="images/icons/salir.png" height="25px" width="25px" alt="Cerrar Sesion" style="position: relative; bottom:5%;"></a>


    </div>
    </div>
    </div>
    </div>
    </div>




    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="home.php">HOME</a> <span class="mx-2 mb-0">/</span> <a href="carrito_compras.php"><strong class="text-black">PAGO</strong></a></div>
            </div>
        </div>
    </div>


    <?php

    if ($_POST) {

        $producto1 = "";
        $total = 0;
        $SID = session_id();
        //$Correo=$_POST['email'];

        foreach ($_SESSION['CARRITO'] as $indice => $producto) {

            $producto1 .= $producto['nombre'] . " ,Cantidad: ";
            $producto1 .= $producto['cantidad'] . ". ";

            $total = $total + ($producto['precio'] * $producto['cantidad']);
        
/*
        $sentencia = $pdo->prepare("INSERT INTO `ventas` 
                (`ID`,`nombre`,`producto`, `ClaveTransaccion`,`no_venta`,`direccion`, `Fecha`, `Total`, `status`) 
        VALUES (NULL,:nombre, :producto,:ClaveTransaccion,:no_venta,:direccion, NOW(), :Total, 'PENDIENTE');");*/

$sentencia = $pdo->prepare("INSERT INTO `ventas` 
(`ID`,`nombre`,`producto`, `ClaveTransaccion`,`no_venta`, `Fecha`, `Total`, `status`, `referencia`,`direccion`) 
VALUES (NULL,:nombre, :producto,:ClaveTransaccion,:no_venta, NOW(), :Total, 'PENDIENTE','',:direccion);");


        $no_venta = bin2hex(random_bytes(10));

        $sentencia->bindParam(":nombre", $_SESSION['usuario']['nombre']);
        $sentencia->bindParam(":producto", $producto1);
        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":no_venta", $no_venta);
        $sentencia->bindParam(":direccion", $datos_usuario['direccion']);

        //$sentencia->bindParam(":Correo",$Correo);
        $sentencia->bindParam(":Total", $total);
        // $sentencia->execute();
        $sentencia->execute();
        $idVenta = $pdo->lastInsertId();
    }
}

    ?>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;

            }

            #btn-bs {
                width: 100%;
                margin-bottom: 1%;
            }
        }

        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }

            #btn-bs {
                width: 250px;
                margin-bottom: 1%;
            }
        }
    </style>
    <br>

    <div class="container">
        <div class="jumbotron text-center bg-info">
            <h1 class="display-4" style="color:white;">¡Paso Final!</h1>
            <hr class="my-4">
            <p class="lead" style="color:white;"> Estas a punto de pagar la cantidad de:
                <?php $total_bsf = $total * 1100000; ?>

                <h4 style="color:white;padding-bottom:2%;">$<?php echo number_format($total, 2); ?> (<?php echo $total_bsf; ?>bsf al cambio.)</h4>
                <a href="bs.php?ult_p=<?php echo $idVenta; ?>"><button type="button" class="btn btn-success" id=btn-bs>Referencia Bancaria</button></a>

                <!-- Set up a container element for the button -->

                <center>
                    <div id="paypal-button-container"></div>
                </center>


            </p>
            <p></br>
                <strong> -</strong>
            </p>
        </div>
    </div>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>',
                            description: "Compra de Productos: $<?php number_format($total, 2); ?>",
                            reference_id: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"

                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    //alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    console.log(data);
                    window.location = "finalizar.php?ult_p=<?php echo $idVenta; ?>" //+ data.paymentToken
                });
            }


        }).render('#paypal-button-container');
    </script>





    <?php include 'templates/pie.php'; ?>