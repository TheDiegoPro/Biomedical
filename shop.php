<?php include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';

if (isset($_SESSION['usuario'])) {
}else{

  header('location:login/index.php');

}

$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();

$sql2 = $pdo->prepare("SELECT * FROM productos");
$sql2->execute();
$listaProductos = $sql2->fetchALL(PDO::FETCH_ASSOC);

$total_articulos_db = $sql2->rowCount();
//echo $total_articulos_db;
$paginas = $total_articulos_db / 9;
$paginas = ceil($paginas);
//echo $paginas;
$articulos_x_pagina = 9;

if (!$_GET) {
  header('Location:shop.php?pagina=1');
}

if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
  header('Location:shop.php?pagina=1');
}

$iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;

$sql_articulos = 'SELECT * FROM productos ORDER BY rand() LIMIT :inicar,:narticulos';
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
$sentencia_articulos->execute();

$resultado_articulos = $sentencia_articulos->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Biomedical - TIENDA</title>
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
            <li><a href="shop_category.php?category=vitaminas&pagina=1">Vitaminas</a></li>
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
        <div class="col-md-12 mb-0"><a href="home.php">HOME</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">TIENDA</strong></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <?php if ($mensaje != "") { ?>
        <center>
            <div class="alert alert-warning col-4">
                <?php echo ($mensaje);


                ?>

                <a href="carrito_compras.php" class="badge badge-success">Ver Carrito</a>

            </div>
        </center>
    <?php } ?>



  <!-- LISTA DE PRODUCTOS-->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <?php foreach ($resultado_articulos as $producto) { ?>
          
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop-single.php?id_producto=<?php echo $producto['ID'];?>"> <img src="<?php echo $producto['imagen']; ?>" alt="Image" width="250px" height="250px" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion']; ?>"></a>
            <h3 class="text-dark"><a href="shop-single.php?id_producto=<?php echo $producto['ID'];?>"><?php echo $producto['nombre']; ?></a></h3>
            <p class="price">$<?php echo $producto['precio']; ?></p>

            <form action="" method="post">

              <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
              <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($producto['imagen'], COD, KEY); ?>">
              <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
              <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
              <input type="hidden" name="tb" id="tb" value="<?php echo openssl_encrypt($producto['cantidad'], COD, KEY); ?>">


              <div class="container">
                <br>
                <?php

                if ($producto['cantidad'] == 0) { ?>
                  <center><input class="form-control col-md-2 disabled" type="number" name="cantidad" id="cantidad" placeholder="1" min="1" value="1"></center>
                  <br>
                  <button type="button" class="btn btn-outline-info disabled">DETALLE</button>
                  <button class="btn btn-outline-success disabled" name="btnaccion" value="agregar" type="submit" disabled>
                    AGREGAR
                  </button>
                <?php } else { ?>
                  <center><input class="form-control col-md-2" type="number" name="cantidad" id="cantidad" placeholder="1" min="1" value="1"></center>
                  <br>
                  <a href="shop-single.php?id_producto=<?php echo $producto['ID'];?>"><button type="button" class="btn btn-outline-info">DETALLE</button></a>
                  <button class="btn btn-outline-success" name="btnaccion" value="agregar" type="submit">
                    AGREGAR
                  </button>
                <?php } ?>
              </div>

            </form>




            <br>

          </div>

        <?php } ?>









      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="shop.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
              </li>

              <?php for ($i = 0; $i < $paginas; $i++) : ?>

                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="shop.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

              <?php endfor ?>


              <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                <a class="page-link" href="shop.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  </div>




  <!-- JAVA SCRIPT PARA PONER EL MOUSE EN LOS PRODUCTOS Y QUE APAREZCA LA RESPECTIVA DESCRIPCION -->
  <script>
    $(function() {
      $('[data-toggle="popover"]').popover()
    });
  </script>
  <?php include 'templates/pie.php'; ?>