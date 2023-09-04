<?php

require 'global/conexion_login.php';
require 'global/funcs.php';

$user_id = null;
$token = null;
	
if(empty($_GET['user_id'])){
 header('Location: index.php');
}
if(empty($_GET['token'])){
	header('Location: index.php');
}
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);

	if(!verificaTokenPass($user_id,$token)){
echo'no se pudo verificar los datos ';
exit;
	}
	
?>
<!DOCTYPE html>
<html>

<head>
	<title>Recuperación de Contraseña</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
	<link rel="stylesheet" href="bootstrap-5.0.0-alpha1-dist/css/bootstrap.min.css">

</head>


<body style="background-color: #c6d1dd" >


<img src="img/logo1.png" width="150px" id="lr">
	
<div class="container col-xs-3 col-md-5 col-lg-10">
  <div class="form" >
  <div class="container-fluid">
					
				</div>
				<div  id="registroform1" >
				<h3>Recuperar Contraseña</h3>
				<br>
				<form class="login-form" action="guarda_pass.php" method="post" autocomplete="off">
				<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
				<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />


				<h5>Escribe una contraseña nueva.</h5>

	<input type="password" id="email1"  name="password" class="input form-control mb-2" autofocus required placeholder="Nueva Contraseña">
<input type="password" id="email1" name="con_password" class="input form-control mb-2" autofocus required placeholder="Confirmar Contraseña">


				<button type="submit" id="btn-login" class="btn btn-primary btn-lg">Enviar</button>



</body>

</html>


</html>