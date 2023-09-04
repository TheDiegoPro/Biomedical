<?php require 'global/conexion_login.php';
require 'global/funcs.php';

$errors=array();

if (!empty($_POST)){
	$nombre=$mysqli->real_escape_string($_POST['nombre']);
	$usuario=$mysqli->real_escape_string($_POST['usuario']);
	$password=$mysqli->real_escape_string($_POST['password']);
	$con_password=$mysqli->real_escape_string($_POST['con_password']);
	$email=$mysqli->real_escape_string($_POST['email']);
	$apellido=$mysqli->real_escape_string($_POST['apellido']);
	$telefono=$mysqli->real_escape_string($_POST['telefono']);
	$cedula=$mysqli->real_escape_string($_POST['cedula']);
	$letra=$mysqli->real_escape_string($_POST['letra']);
	$conca=$letra.'-'.$cedula;

	$activo = 0;
	$id_tipo = 2;

	if (isNull($nombre, $usuario, $password, $con_password, $email,$apellido,$telefono,$cedula,$letra,$conca)) {
		$errors[] = "debe llenar todos los campos ";
	}
	if (!isEmail($email)) {
		$errors[] = " Direccion de correo invalida ";
	}
	if (!validaPassword($password, $con_password)) {
		$errors[] = "Las contraseñas no coinciden  ";
	}
	if (emailExiste($email)) {
		$errors[] = "El correo electronico ya existe ";
	}
	if (usuarioExiste($usuario)) {
		$errors[] = "El nombre de usuario ya existe ";
	}

	if(count($errors)==0){

		$token=generateToken();

		$registro = registraUsuario($nombre,$rif,$estado,$telefono,$postal,$correo,$password,$direccion,$tipo_e, $activo, $token, $id_tipo);

		if($registro>0) {

			$asunto = 'Activar Cuenta- sistema de usuario';
			$url = 'http://'.$_SERVER["SERVER_NAME"].
				'/activar.php?id='.$registro.'&val='.$token;
			$cuerpo=" Estimado $nombre: <br /><br /> Para continuar con el proceso
		de registro , Haga click en: <a href='$url'> Activar Cuenta <a/>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo)) {
				header('Location:abrir_para_activar.php');
				exit;
			}else {
				$errors[] = "Error al enviar Email email $email, nombre $nombre ,asunto $asunto ,cuerpo $cuerpo";
			}
		}else{
			$errors[] = "error al Registrar";
			
		}
	}
}


?>

<!-- SCRIPT PARA NO PERMITIR LETRAS EN UN CAMPO DE NUMEROS -->
<script>
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}</script>
<!DOCTYPE html>
<html>
<head>

</head>

<style>

body{

	background:#020448;
}

</style>

<div class="login-page">
  <div class="form">
  <div class="container-fluid">
					<img src="img/avatar.svg" width="100px">
				</div>
				<br>
    			<br>
    <form class="login-form" action="<?php $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
      
	<input type="text" value="<?php if(isset($nombre)){echo $nombre;}?>" name="nombre" class="input" autofocus required placeholder="Nombre">
	<input type="text" value="<?php if(isset($apellido)){echo $apellido;}?>" name="apellido" class="input" autofocus required placeholder="Apellido">
	<!--CAMPO DE LA CEDULA-->
	<div class="container">
	<div class="row">
    <div class="col-md-4">
     <div class="form-group" style="margin-top: 5px;">
		 <select id="my-select" class="form-control" name="letra" value="<?php if(isset($letra)){echo $letra;}?>">
			 <option>V</option>
			 <option>J</option>
			 <option>P</option>
			 <option>E</option>
		 </select>
	 </div>
    </div>
    <div class="col">
	<input type="text" value="<?php if(isset($cedula)){echo $cedula;}?>" name="cedula" class="input" autofocus required placeholder="Cédula de Identidad"  onkeypress="return numeros(event)">
    </div>
  </div>
	
	</div>
	<!---->


	<input type="text" value="<?php if(isset($telefono)){echo $telefono;}?>" name="telefono" class="input" autofocus required placeholder="Teléfono" onkeypress="return numeros(event)">
	<input type="email" placeholder="Correo Electronico" name="email" class="input" autofocus required value="<?php if(isset($email)){ echo $email;}?>">
	<input type="text" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1,15}" name="usuario" class="input" value="<?php if(isset($usuario)){ echo $usuario;}?>" autofocus required>
	<input type="password" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="password" class="input" required>
	<input type="password" placeholder="Repetir Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="con_password" class="input" required>

	  <button type="submit" id="btn-signup">Registrarse</button>
	  <?php echo resultBlock($errors);?>
      <p class="message"> <a href="login.php">Volver</a></p>
    </form>
  </div>
</div>

<body>
	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</html>