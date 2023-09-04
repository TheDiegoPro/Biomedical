<?php include 'global_pdo/conexion.php';
include 'login/global/funcs.php';
session_start();


if (isset($_SESSION['usuario'])) {
}else{

  header('location:login/index.php');

}

if (isset($_SESSION['usuario'])) {
}else{

  header('location:login/index.php');

}

$id_usuario= $_SESSION['usuario']['id'];

$sql=$pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Biomedical - Home</title>
  
  <?php include 'templates/header.php';?>

  <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="home.php">HOME</a></li>
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
                <li><a href="profile.php"><?php echo $datos_usuario['nombre'];?></a></li>
                <li><a href="compras.php">COMPRAS</a></li>
              </ul>
            </nav>
          </div>


         

          <style>#iconos{position: relative; right:30%;}</style>
          <div class="icons">       
          <a href="#" class="icons-btn d-inline-block js-search-open" id="iconos"><span class="icon-search"></span></a>



         <!-- <a href="profile.php" id="iconos"><?php echo $_SESSION['usuario']['nombre'];?><img src="images/icons/usuario.png" alt="" width="20px" height="20px"></a> -->
        

            <a href="carrito_compras.php" class="icons-btn d-inline-block bag" id="iconos">
              <span class="icon-shopping-bag"></span>
              <span class="number"><?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                ?></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
                
                <a href="login/salir.php"><img src="images/icons/salir.png" height="25px" width="25px" alt="Cerrar Sesion" style="position: relative; bottom:5%;"></a>

          </div>
        </div>
      </div>
    </div>

    

    <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Medicina Efectiva, Nuevos Avances Todos los Dias</h2>
              <h1>Bienvenido a Biomedical</h1>
              <p>
                <a href="shop.php" class="btn btn-primary px-5 py-3" style="color:white;">Ir a la Tienda</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

   <br>
   <br>

  <center><h1><b>PRODUCTOS MAS BUSCADOS</b></h1></center>

<br>
<style>.card:hover{
  background-color: #23E5E5;
  color: white;
}</style>
    <div class="container">
            <div class="card-deck">
          <div class="card">
            <a href="shop_category.php?category=analgesicos&pagina=1"><img class="card-img-top" src="images/productos/acetaminofen3.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title">Analgesicos</h5>
              <p class="card-text">Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.</p>
              <p class="card-text"><small class="text-muted"></small></p>
            </div>
          </div>
          <div class="card">
            <a href="shop_category.php?category=antihipertensivo&pagina=1"><img class="card-img-top" src="images/productos/antihipertensivo3.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title">Antihipertensivo</h5>
              <p class="card-text">El principio activo es candesartán cilexetilo. Este pertenece a un grupo de medicamentos llamados antagonistas de los receptores de angiotensina II. Actúa haciendo que los vasos sanguíneos se relajen y dilaten. Esto facilita la disminución de la presión arterial.</p>
              <p class="card-text"><small class="text-muted"></small></p>
            </div>
          </div>
          <div class="card">
          <a href="shop_category.php?category=vitaminas&pagina=1"><img class="card-img-top" src="images/productos/vitaminas1.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title">Vitaminas</h5>
              <p class="card-text">Las vitaminas son sustancias presentes en los alimentos en pequeñas cantidades que son indispensables para el correcto funcionamiento del organismo. Actúan como catalizador en las reacciones químicas que se produce en el cuerpo humano provocando la liberación de energía.</p>
              <p class="card-text"><small class="text-muted"></small></p>
            </div>
          </div>
        </div>


    </div>

    
    <?php
 

  


  
 ?>



<?php include 'templates/pie.php'?>