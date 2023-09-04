<?php require 'global/conexion_registro.php';
require 'global/funcs.php';

$errors = array();
session_start();

if(!empty($_POST)){

	$rif = $mysqli->real_escape_string($_POST['rif']);

	$password = $mysqli->real_escape_string($_POST['password']);

	if(isNullLogin($rif,$password)){

		$errors[]="Dede llenar todos los campos";

	}

$errors[]=login($rif,$password);

}

if (isset($_SESSION['usuario'])){

	if($_SESSION['usuario']['Tipo_usuario']=='1'){

		header('location: ../home.php');

	}else if($_SESSION['usuario']['Tipo_usuario']=='2'){

		header('location: ../home_lab.php');

	}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-5.0.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos1.css" >
    <script src="bootstrap-5.0.0-alpha1-dist/js/bootstrap.min.js"></script>
    <title>Biomedical</title>
  </head>
  <body class="bg-dark">
      <section>
        <div class="row g-0" >
            <div class="col-xs-0 col-md-0 col-sm-0 col-lg-7 d-none d-lg-block">
                <div id="carouselEj" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselEj" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselEj" data-slide-to="1"></li>
                      <li data-target="#carouselEj" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item img-1 min-vh-100 active">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">OFRECEMOS CALIDAD</h5>
                        </div>
                      </div>
                      <div class="carousel-item img-2 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">SOMOS TU MEJOR OPCIÓN</h5>
                        </div>
                      </div>
                      <div class="carousel-item img-3 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">SIEMPRE DISPONIBLES PARA TI</h5>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselEj" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselEj" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>

            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 mb-auto w-100">
                  <img style="width: 200px; height:200px; position: absolute; margin-left: 140px; margin-top: -30px;" src="img/logo1.png" />
                </div>
                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4">Bienvenido</h1>
                <form class="mb-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="mb-4">
                      <label for="exampleInputEmail1" class="form-label font-weight-bold">R.I.F.</label>
                      <input type="text" class="form-control bg-dark-x border-0" placeholder="Ingresa R.I.F"  name="rif">
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                      <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa la contraseña" id="exampleInputPassword1" name="password">
                      <a href="recupera.php" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                    <?php echo resultBlock($errors);?>
                  </form>
                                  <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="registro.php" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
                </div>
                </div>
                </div>

            </div>
        </div>
      </section>
  </body>
</html>
