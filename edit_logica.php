<?php include 'global_pdo/conexion.php';
include 'login/global/funcs.php';
session_start();

$id_usuario = (isset($_POST['id'])) ? $_POST['id'] : "";

$txtemail = (isset($_POST['txtemail'])) ? $_POST['txtemail'] : "";
$txttelefono = (isset($_POST['txttelefono'])) ? $_POST['txttelefono'] : "";
$txtdireccion = (isset($_POST['txtdireccion'])) ? $_POST['txtdireccion'] : "";

$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";


$sentencia = $pdo->prepare("UPDATE usuarios SET email=:email, telefono=:telefono,direccion=:direccion WHERE id=:id");

    $sentencia->bindParam(':email', $txtemail);
    $sentencia->bindParam(':telefono', $txttelefono);
    $sentencia->bindParam(':direccion', $txtdireccion);
    $sentencia->bindParam(':id', $id_usuario);
    $sentencia->execute();

    $Fecha = new DateTime();
    $nombreArchivo = ($foto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

    $tmpFoto = $_FILES["foto"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "images/" . $nombreArchivo);

      $sentencia = $pdo->prepare("SELECT foto FROM usuarios WHERE id=:id");
      $sentencia->bindParam(':id', $id_usuario);
      $sentencia->execute();
      $producto = $sentencia->fetch(PDO::FETCH_LAZY);


      if (isset($producto["imagen"])) {
        if (file_exists($producto["imagen"])) {

          if ($item['imagen'] != "imagen.jpg") {
            unlink($producto["imagen"]);
          }
        }
      }

      $sentencia = $pdo->prepare("UPDATE usuarios SET foto= 'images/' :foto WHERE id=:id ");
      $sentencia->bindParam(':foto', $nombreArchivo);
      $sentencia->bindParam(':id', $id_usuario);
      $sentencia->execute();
    }

    if($_SESSION['usuario']['Tipo_usuario'] == '1'){
   header('location: profile.php');
    }else if($_SESSION['usuario']['Tipo_usuario'] == '2'){
      header('location: profile_lab.php');
    }

?>

