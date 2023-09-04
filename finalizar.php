<?php 
include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';

/*VALIDACION DEL HEADER DE LA PAGINA PARA IMPEDIR QUE SE ESCRIBA finalizar.PHP DESDE EL BUSCADOR */
if (isset($_GET['ult_p'])) {
} else {

    header('Location:shop.php?pagina=1');
}

if (isset($_SESSION['usuario'])) {
}else{

  header('location:login/index.php');

}

$variable = $_GET['ult_p'];


//PROCESO PARA REALIZAR UN UPDATE MEDIANTE $_GET
$sql = $pdo->prepare("UPDATE `ventas` SET `status`= 'APROBADO' WHERE ID=:ultimo");
$sql->bindParam(":ultimo", $variable);
 $sql->execute();


 //SENTENCIA PARA DESCONTAR PRODUCTOS DE LA BASE DE DATOS UTILIZANDO DATOS RECEPCINADOS CON $_GET
   
 foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $totalbd= $producto['tb'];
            $descontar= $producto['cantidad'];
            
            $sentencia = $pdo->prepare("UPDATE productos SET cantidad = ".$totalbd." - ".$descontar." WHERE id=".$producto['ID']." ");
          $sentencia->execute();
 }

 $id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Biomedical - FINALIZAR COMPRA</title>
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
                <li><a href="profile.php"><?php echo $datos_usuario['nombre'];?></a></li>
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
                <div class="col-md-12 mb-0"><a href="home.php">HOME</a> <span class="mx-2 mb-0">/</span> <a href="carrito_compras.php"><strong class="text-black">FINALIZAR COMPRA</strong></a></div>
            </div>
        </div>
    </div>
    
<br>

<div class="container">

    <div class="jumbotron">
    <h1 class="display-4" style="color:black;"><center>Compra Finalizada!</center></h1>
   <center> <img src="images/icons/check.png" alt="" width="250px" height="200px"></center>

   <hr class="my-4">
   <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Foto</th>
                      <th class="product-name">Producto</th>
                      <th class="product-price">Precio</th>
                      <th class="product-quantity">Cantidad</th>
                      <th class="product-total">Total</th>
                      
                    </tr>
                  </thead>
                  <?php $total = 0; ?>
                  <?php foreach ($_SESSION['CARRITO'] as $indice => $productos) { ?>
                    <tbody>
                      <tr>
                        <td class="product-thumbnail">
                          <img src="<?php echo $productos['imagen']; ?>" alt="Image" class="img-fluid">
                        </td>
                        <td class="product-name">
                          <h2 class="h5 text-black"><?php echo $productos['nombre']; ?></h2>
                        </td>
                        <td>$<?php echo $productos['precio'] ?></td>
                        <td>
                          <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="container col-6">
                              <label for="" style="position:relative; top:30%;"><?php echo $productos['cantidad'] ?></label>
                            </div>
                          </div>

                        </td>
                        <td>$<?php echo number_format($productos['precio'] * $productos['cantidad'], 2);  ?></td>
                     
                                             
                        
                      </tr>
                     
                    </tbody>

                    <!--PROCESO PARA CALCULAR EL TOTAL-->
                    <?php $total = $total + ($productos['precio'] * $productos['cantidad']); ?>

                  <?php } ?>
                </table>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                
                <div class="col-md-6">
                 <a href="shop.php"><button class="btn btn-outline-primary btn-md btn-block">Volver</button></a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                 
                </div>
                <div class="col-md-8 mb-3 mb-md-0">
                  
                </div>
                <div class="col-md-4">
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">TOTAL DE COMPRA</h3>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <span class="text-black">Subtotal</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <?php //$subtotal=$productos['precio'] + $productos['precio'];?>
                      <strong class="text-black">$<?php //echo $subtotal;?></strong>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">$<?php echo number_format($total, 2); ?></strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <center><a href="imprimir.php" target="_blank"><b>IMRPIMIR FACTURA</b></a></center>
    <hr class="my-4">
    
    
</div>

</div>



    <?php include 'templates/pie.php'; ?>