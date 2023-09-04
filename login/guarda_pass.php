<?php
	
	require 'global/conexion_login.php';
	require 'global/funcs.php';
	$errors="Contraseña modificada con exito.";
	
	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);
	
	
	if(validaPassword($password,$con_password)){
		$pass_hash=hashPassword($password);
		if(cambiaPassword($password,$user_id,$token)){
			
		

		}else{
			$errors="Error al modificar la contraseña. Por cuestiones de seguridad para volver a intentarlo vuelva a acceder al link proporcionado.";
		}
	}else{
		$errors="Las contraseña no coinciden. Por cuestiones de seguridad para volver a intentarlo vuelva a acceder al link proporcionado.";
	}

?>	


<!DOCTYPE html>
<html>

<head>
	<title>Recuperar Contraseña</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
	<link rel="stylesheet" href="bootstrap-5.0.0-alpha1-dist/css/bootstrap.min.css">

</head>



<body>



<style>

body{

	background: #c6d1dd;
}


	
</style>


<div class="login-page">
  <div class="form">
  <div class="container-fluid">
					<img src="img/logo1.png" width="150px">
				</div>


				<div class="container col-xs-3 col-md-5 col-lg-10" id="registroform1" >
				<h3><?php echo $errors?></h3>
			     <form class="login-form" action="index.php" method="" autocomplete="off">

	
	              <button type="submit" class="btn btn-secondary">VOLVER</button>   





			<!--	<h3><?php echo $errors?></h3>
				<br>
				
    
	<button type="submit" id="btn-login">Volver</button> -->
	  
    </form>
  </div>
</div>



</body>




</html>		





