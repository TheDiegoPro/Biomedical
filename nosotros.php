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
?>

<!DOCTYPE html>
<html lang="en">
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
                <li class="active"><a href="nosotros.php">NOSOTROS</a></li>
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

<div class="site-blocks-cover inner-page" style="background-image: url('images/bg_2.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto align-self-center">
        <div class=" text-center">
          <h1 style="color:black;font-family:Verdana, Geneva, Tahoma, sans-serif;">Biomedical</h1>
          <p style="color:black;font-family:Verdana, Geneva, Tahoma, sans-serif;">En Laboratorios BioMedical fabricamos productos farmacéuticos genéricos de alta calidad y de gran aceptación por el público, como analgésicos, antiinflamatorios, antipiréticos, protectores gástricos y mas.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light custom-border-bottom" data-aos="fade">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6">
        <div class="block-16">
          <figure>
            <img src="images/quienes.jpg" alt="Image placeholder" class="img-fluid rounded">


          </figure>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">


        <div class="site-section-heading pt-3 mb-4">
          <h2 class="text-black">QUIENES SOMOS</h2>
        </div>
        <p>Somos una empresa dedicada a los servicios de medicina de laboratorio que busca la satisfacción del usuario, utilizando personal técnico especializado aplicando buenas prácticas profesionales y herramientas de alto nivel, enfocado en la mejora continua para el cumplimiento y actualización de procesos.</p>


      </div>
    </div>
  </div>
</div>



<div class="site-section bg-light custom-border-bottom" data-aos="fade">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 order-md-2">
        <div class="block-16">
          <figure>
            <img src="images/quienes3.jpg" alt="Image placeholder" class="img-fluid rounded" width="100%">


          </figure>
        </div>
      </div>
      <div class="col-md-5 mr-auto">


        <div class="site-section-heading pt-3 mb-4">
          <h2 class="text-black">VISIÓN</h2>
        </div>
        <p class="text-black">Ser un Laboratorio de Referencia líder de la región, con tecnología avanzada y personal altamente calificado e idóneo para la realización de un servicio confiable y rentable</p>


      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light custom-border-bottom" data-aos="fade">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6">
        <div class="block-16">
          <figure>
            <img src="images/quienes2.jpg" alt="Image placeholder" class="img-fluid rounded" width="100%">


          </figure>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">


        <div class="site-section-heading pt-3 mb-4">
          <h2 class="text-black">MISIÓN</h2>
        </div>
        <p>Contribuir a mejorar la calidad de vida de la población venezolana resolviendo sus necesidades de salud mediante productos farmacéuticos de la más alta calidad.</p>

      </div>
    </div>
  </div>
</div>



<div class="container">
  <center>
    <div class="row">
      <div class="col" data-aos="fade-up" data-aos-delay=""><img src="images/icons/check_b.png" width="100" height="100" alt="">

        <br>

        <h4 style="font-family:Verdana, Geneva, Tahoma, sans-serif;color:black;"><b>PROFESIONALISMO</b></h2>
        <p>Ética en la actitud del personal hacia su público.</p>
      </div>


      <div class="col" data-aos="fade-up" data-aos-delay=""><img src="images/icons/quality.png" width="100" height="100" alt="">
        <br>

        <h4 style="font-family:Verdana, Geneva, Tahoma, sans-serif;color:black;"><b>CALIDAD</b></h2>
        <p>En todo el proceso de la presentación del servicio.</p>
      </div>
      <div class="col" data-aos="fade-up" data-aos-delay=""><img src="images/icons/shield.png" width="100" height="100" alt="">
        <br>

        <h4 style="font-family:Verdana, Geneva, Tahoma, sans-serif;color:black;"><b>CONFIANZA</b></h2>
        <p>Confiabilidad en los resultados.</p>
      </div>
      <div class="col" data-aos="fade-up" data-aos-delay=""><img src="images/icons/teamwork.png" width="100" height="100" alt="">
        <br>

        <h4 style="font-family:Verdana, Geneva, Tahoma, sans-serif;color:black; font-size:21px;"><b>TRABAJO EN EQUIPO</b></h4>
        <p>Colaboración y cooperación entre su equipo de trabajo.</p>
      </div>
    </div>
  </center>
</div>



<br>
<hr>

<?php include 'templates/pie.php'; ?>