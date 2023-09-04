<?php
	require 'global/conexion_login.php';
	require 'global/funcs.php';
	
	$mensaje = null;
	
if(isset($_GET["id"]) AND isset($_GET['val']))
{
	$idUsuario= $_GET['id'];
	$token= $_GET['val'];

	$mensaje =validaIdToken($idUsuario, $token);
}
	
?>

<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

</head>

<body>



<style>

body{

	background: #02A772;
}


</style>


<div class="login-page">
  <div class="form">
  <div class="container-fluid">
					<img src="img/avatar.svg" width="100px">
				</div>
				<h3></h3>
				<br>
				
    <form class="login-form" action="login.php" method="" autocomplete="off">
	

	<h3><?php echo $mensaje;?></h3>

	  <button type="submit" id="btn-login">Volver</button>
	  
    </form>
  </div>
</div>

	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>


</body>

</html>		

