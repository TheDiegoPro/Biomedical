<?php require 'global/conexion_login.php';
require 'global/funcs.php';

$errors=array();

if(!empty($_POST)){
	
$correo=$mysqli->real_escape_string($_POST['correo']);

    if(!isEmail($correo))
    { 
	$errors[]=" Debe ingresar un correo electronico valido";}

	 if(emailExiste($correo)){  
	$user_id=getValor('id','email',$correo);
	$nombre=getValor('nombre','email',$correo);

	$token=generaTokenPass($user_id);

	$asunto='Recupera Password - Sistema de usuarios';
	$url= 'http://'.$_SERVER["SERVER_NAME"].
	'/proyecto_cuco/cambia_pass.php?user_id='.$user_id.'&token='.$token;
	$cuerpo =" Estimado $nombre: <br /><br /> Se ha solicitado un reinicio 
	de contraseña. <br /><br /> Para restaurar la contraseña,
	visita la siguiente direccion: <a href='$url'>cambiar password<a/>";

if(enviarEmail($correo,$nombre,$asunto,$cuerpo)){
	header("location:correo_enviado.php");
}else{
	$errors[]="Error al enviar Email";
     }
	 }else{
		 $errors[]=" No existe el correo electronico";
	       }
     }?>

<!DOCTYPE html>
<html>
<head>
	<title>Recuperación de Contraseña</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="bootstrap-5.0.0-alpha1-dist/css/bootstrap.min.css">


</head>


<body>

<style>

body{

	background:#c6d1dd;
}


</style>

<img src="img/logo1.png" width="150px" id="lr">
<div class="container col-xs-3 col-md-5 col-lg-10">
  <div class="form" >
  <div class="container-fluid">
					
				</div>
				<div  id="registroform1" >
				<h3>Recuperar Contraseña</h3>
				<br>
				
    <form class="login-form" action="<?php $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
	<h4>Para recuperar tu contraseña, escribe tu correo electronico para enviarte un link especial para el cambio de contraseña.</h4>

	<div class="mb-4">
                      <label for="exampleInputEmail1" class="form-label font-weight-bold"></label>
                      <input type="text" class="form-control bg-dark-x  mb-2" id="exampleInputEmail1" placeholder="Ingresa correo electrónico" name="correo">
                    </div>

	<br>

	  <button type="submit" class="btn btn-primary btn-lg">Enviar</button><br><br>
	  <center class="animated heartBeat text-danger" ><?php echo resultBlock($errors);?></center>


			<form class="login-form" action="index.php" method="" autocomplete="off">

	<br>

	  

    </form>
	<a href="index.php"><button class="btn btn-secondary btn-lg"  >Volver</button></a>
  </div>
</div>



</body>
</html>							