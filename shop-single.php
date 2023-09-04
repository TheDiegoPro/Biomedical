<?php include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';



$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();

$id_producto = $_GET['id_producto'];

$consulta = $pdo->prepare("SELECT * FROM productos where id = $id_producto");
$consulta->execute();
$datos_producto = $consulta->fetch();

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

  <br>
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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="<?php echo $datos_producto['imagen'] ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $datos_producto['nombre']; ?></h2>
            <p><?php echo $datos_producto['descripcion']; ?></p>


            <p> <strong class="text-primary h4">$<?php echo $datos_producto['precio'] ?></strong></p>


            <form action="" method="post">

              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 220px;">
                  <center><input class="form-control col-md-4" type="number" name="cantidad" id="cantidad" placeholder="1" min="1" value="1"></center>

                </div>

              </div>

              <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($datos_producto['ID'], COD, KEY); ?>">
              <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($datos_producto['imagen'], COD, KEY); ?>">
              <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($datos_producto['nombre'], COD, KEY); ?>">
              <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($datos_producto['precio'], COD, KEY); ?>">
              <input type="hidden" name="tb" id="tb" value="<?php echo openssl_encrypt($datos_producto['cantidad'], COD, KEY); ?>">
              <!--<p><a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>-->

              <button class="btn btn-outline-info" name="btnaccion" value="agregar" type="submit">Agregar al Carrito</button>
            </form>
            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Especificaciones</a>
                </li>


              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">

                  <?php if($datos_producto['nombre'] == 'gotas' && $datos_producto['nombre'] == 'jarabe')?>


                    <tbody>
                      <tr>
                        <td>CANTIDAD DISPONIBLE:</td>
                        <td class="bg-light"><?php echo $datos_producto['cantidad'];?></td>
                      </tr>
                      <tr>
                        <td class="bg-light"><?php echo $datos_producto['fecha_vencimiento'];?></td>
                        
                      </tr>
                      <tr>
                        <td>NUMERO DE PRODUCTO POR UNIDAD</td>
                        <td class="bg-light"><?php echo $datos_producto['numero_productos'];?></td>
                      </tr>
                      <tr>
                        <td>NUMERO DE CAJAS POR LOTE</td>
                        <td class="bg-light"><?php echo $datos_producto['num_cajas_lote'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include 'templates/pie.php'; ?>