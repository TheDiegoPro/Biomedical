<?php require 'global/conexion_login.php';
require 'global/funcs.php';

$errors = array();

if (!empty($_POST)) {
  $nombre = $mysqli->real_escape_string($_POST['nombre']);
  $rif = $mysqli->real_escape_string($_POST['rif']);
  $estado = $mysqli->real_escape_string($_POST['estado']);
  $telefono = $mysqli->real_escape_string($_POST['telefono']);
  $postal = $mysqli->real_escape_string($_POST['postal']);
  $correo = $mysqli->real_escape_string($_POST['correo']);
  $password = $mysqli->real_escape_string($_POST['password']);
  $con_password = $mysqli->real_escape_string($_POST['con_password']);
  $direccion = $mysqli->real_escape_string($_POST['direccion']);

  //$tipo_e = $mysqli->real_escape_string($_POST['tipo_e']);

  
  
  $activo = 0;
  $id_tipo = 2;

  if (isNull($nombre,$rif,$estado,$telefono,$postal,$correo,$password,$con_password,$direccion)) {
    $errors[] = "DEBE LLENAR TODOS LOS CAMPOS";
  }
  if (!isEmail($correo)) {
    $errors[] = "DIRECCION DE CORREO INVALIDA";
  }
  if (!validaPassword($password, $con_password)) {
    $errors[] = "LAS CONTRASEÑAS NO COINCIDEN";
  }
  if (emailExiste($correo)) {
    $errors[] = "EL CORREO ELECTRONICO YA ESTA REGISTRADO";
  }
  if (usuarioExiste($rif)) {
    $errors[] = "EL R.I.F. YA ESTA REGISTRADO";
  }

  if (count($errors) == 0) {

    $token = generateToken();
    $foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
    $registro = registraUsuario($nombre,$rif,$estado,$telefono,$postal,$correo,$foto,$password,$direccion,$activo, $token, $id_tipo);

    if ($registro > 0) {

      $asunto = 'Activar Cuenta- sistema de usuario';
      $url = 'http://' . $_SERVER["SERVER_NAME"] .
        '/proyecto_cuco/login/activar.php?id=' . $registro . '&val=' . $token;
      $cuerpo = " Estimado $nombre: <br /><br /> Para continuar con el proceso
		de registro , Haga click en: <a href='$url'> Activar Cuenta <a/>";

      if (enviarEmail($correo, $nombre, $asunto, $cuerpo)) {
        header('Location:abrir_para_activar.php');
        exit;
      } else {
        $errors[] = "Error al enviar Email email $correo, nombre $nombre ,asunto $asunto ,cuerpo $cuerpo";
      }
    } else {
      $errors[] = "Error al registrar";
    }
  }
}


?>

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="css/estilos1.css">
  <link rel="stylesheet" href="bootstrap-5.0.0-alpha1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
</head>

<body style="background-color: #c6d1dd;">
<style>
  /* MAX WIDTH PARA LOS TAMAÑOS DE TELEFONOS*/
  @media (max-width: 576px) {
    #volver{
      position:relative;
      left:10%;
      bottom:16px;
    }

    #registro{
      position:relative;
      top: 25px;
      right: 87px;
      
    }
   }
/* MIN WIDTH PARA EL TAMAÑO EN PC */
   @media (min-width: 576px) {
    #volver{
      position:relative;
      left:52%;
      top:100px;
    }
   }
</style>

  <img src="img/logo1.png" width="180px" style="margin-top: -30px; margin-left: 50px;" alt="logo biomedical" class="float-left d-block">
  <a href="index.php"><button class="btn btn-secondary btn-sm" id="volver"">VOLVER</button></a>
  <div class="container col-xs-3 col-md-5 col-lg-10" id="registroform">
    <h2 id="registro">Registro</h2>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">


      <div class="form-group">
        <label for="country">Nombre de Empresa</label>
        <input type="text"  required class="form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php if(isset($nombre)){echo $nombre;}?>">
      </div>

      <div class="form-group rif">
        <label class="" for="exampleFormControlSelect1">R.I.F</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">J</div>
          </div>
          <input type="text" class="form-control" id="rif" required placeholder="R.I.F" name="rif" onkeypress="return numeros(event)" value="<?php if(isset($rif)){echo $rif;}?>">
        </div>
      </div>
      <div class="form-group ">
        <label for="exampleFormControlSelect1">Estado</label>
        <select class="form-control" required id="estado" name="estado" value="<?php if(isset($estado)){echo $estado;}?>">
          
          <option selected>Amazonas</option>
          <option>Anzoátegui</option>
          <option>Apure</option>
          <option>Aragua</option>
          <option>Barinas</option>
          <option>Bolívar</option>
          <option>Carabobo</option>
          <option>Cojedes</option>
          <option>Delta Amacuro</option>
          <option>Falcón</option>
          <option>Distrito Capital</option>
          <option>Guárico</option>
          <option>Lara</option>
          <option>Mérida</option>
          <option>Miranda</option>
          <option>Monagas</option>
          <option>Nueva Espasrta</option>
          <option>Portuguesa</option>
          <option>Sucre</option>
          <option>Táchira</option>
          <option>Trujillo</option>
          <option>Vargas</option>
          <option>Yaracuy</option>
          <option>Zulia</option>

        </select>
      </div>
      <div class="form-group">
        <label for="number">Número de Teléfono</label>
        <input type="text" required class="form-control" onkeypress="return numeros(event)" placeholder="Teléfono" id="telefono" name="telefono" value="<?php if(isset($telefono)){echo $telefono;}?> ">
      </div>
      <div class="form-group">
        <label for="age">Código Postal</label>
        <input type="text" required class="form-control" onkeypress="return numeros(event)" placeholder="Código Postal" id="cp" name="postal" value="<?php if(isset($postal)){echo $postal;}?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" required class="form-control" placeholder="Email" id="email" name="correo" value="<?php if(isset($correo)){echo $correo;}?>">
      </div>

      <div class="form-group">
        <label for="country">Contraseña</label>
        <input type="password" required class="form-control" placeholder="Contraseña" id="nombre" name="password">
      </div>
      
      <div class="form-group">
        <label for="country">Confirmar contraseña</label>
        <input type="password" required class="form-control" placeholder="Confirmar Contraseña" id="nombre" name="con_password">
      </div>

      <div class="form-group">
        <label for="textarea1">Dirección</label>
        <input type="text" required class="form-control" style="width: 100%;" placeholder="Dirección" id="direccion" name="direccion" value="<?php if(isset($direccion)){echo $direccion;}?>">
      </div>

    

      

      <div class="clearfix" > </div>
      <center class="animated heartBeat text-danger"><?php echo resultBlock($errors);?></center>
    
      

      
      <button id="registro" type="submit" class="btn btn-primary btn-responsive"> <span class="glyphicon glyphicon-search"></span> REGISTRAR</button> 
      
    </form>
    
  </div>
  
</body>

</html>