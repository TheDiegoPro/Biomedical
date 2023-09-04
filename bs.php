<?php include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';



if (isset($_SESSION['usuario'])) {
} else {

    header('location:login/index.php');
}

$ult = $_GET['ult_p'];

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
                <li><a href="profile.php"><?php echo $datos_usuario['nombre'];?></a></li>
                <li><a href="compras.php">COMPRAS</a></li>
            </ul>
        </nav>
    </div>

<!-- SCRIPT PARA NO PERMITIR LETRAS EN UN CAMPO DE NUMEROS -->
<script>
  function numeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
      return false;
  }
</script>
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



    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Numeros de Cuenta</h2>
                    <div class="p-3 p-lg-5 border">



                        <div class="form-group" style="color:black;">
                            <ul>
                                <li>BANCO DE VENEZUELA: 0102-11111111111111111</li>
                                <li>BANESCO: 0134-11111111111111111</li>
                                <li>BOD: 0116-11111111111111111</li>
                                <li>BANCO PROVINCIAL: 0108-11111111111111111</li>
                                <li>BANCO MERCANTIL: 0105-11111111111111111</li>
                            </ul>

                        </div>
                    </div>
                </div>


                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Numero de Referencia</h2>
                            <div class="p-3 p-lg-5 border">

                                <label for="c_code" class="text-black mb-3">Ingresa el numero de Referencia de la transferencia</label>
                                <div class="input-group w-75">
                                    <form action="final_t.php?ult_p=<?php echo $ult; ?>" method="post">
                                        <input type="text" class="form-control" name="referencia" onkeypress="return numeros(event)" id="c_code" placeholder="" aria-label="Coupon Code" aria-describedby="button-addon2" required>

                                        <br>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm px-4" type="submit" id="button-addon2">Enviar</button>
                                    </form>

                                </div>

                            </div>
                            <br>
                            <label for="" style="color: black; font-size:large;">Tasa del Dia: 1.100.000bsf</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
    </div>
    </div>








    <?php include 'templates/pie.php'; ?>