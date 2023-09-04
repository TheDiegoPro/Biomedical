<?php include 'global_pdo/conexion.php';
include 'login/global/funcs.php';
session_start();


if (isset($_SESSION['usuario'])) {
} else {

    header('location:login/index.php');
}

if (isset($_SESSION['usuario'])) {
} else {

    header('location:login/index.php');
}

$id_usuario = $_SESSION['usuario']['id'];



$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();
$nombre_usuario = $_SESSION['usuario']['nombre'];


$sentencia = $pdo->prepare("SELECT * FROM ventas where nombre = '$nombre_usuario' ORDER BY id DESC");
$sentencia->execute();
$listaVentas = $sentencia->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Biomedical - COMPRAS</title>

   
    <?php include 'templates/header.php'; ?>

    <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="home.php">HOME</a></li>
                <li><a href="shop.php">TIENDA</a></li>
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
                <li class="active"><a href="compras.php">COMPRAS</a></li>
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



        <!-- <a href="profile.php" id="iconos"><?php echo $_SESSION['usuario']['nombre']; ?><img src="images/icons/usuario.png" alt="" width="20px" height="20px"></a> -->


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

    <br>
    <br>

<div class="container">
    <div class="table-responsive-md">
        <table class="table" style="background-color: #C6D1DD;color:black;">
            <thead style="background-color: #17A2B8;border-radius:2%;">
            
                <tr>
                    <th scope="col">-</th>
                    <th scope="col"><b><center>NOMBRE</center></b></th>
                   <th scope="col"><center>CODIGO</center></th>
                    <th scope="col"><center>FECHA</center></th>
                    <th scope="col"><center>TOTAL</center></th>
                    <th scope="col"><center>STATUS</center></th>
                    <th scope="col"><center>REFERENCIA</center></th>
                    <th scope="col"><center>PRODUCTO</center></th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($listaVentas as $ventas){?>
                <tr>
                
                    <th scope="row"></th>
                    <td><center><?php echo $ventas['nombre'];?></center></td>
                    <td><center><?php echo $ventas['no_venta'];?></center></td>
                    <td><center><?php echo $ventas['Fecha'];?></center></td>
                    <td><center><?php echo $ventas['Total'];?></center></td>
                    <td><center><?php echo $ventas['status'];?></center></td>
                    <td><center><?php echo $ventas['referencia'];?></center></td>
                    <td><center><button type="button" class="btn btn-md btn-outline-info" data-toggle="popover" title="Detalle de Productos" data-content="<?php echo $ventas['producto']; ?>">Detalle</button></center></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    </div>
    </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <?php include 'templates/pie.php' ?>