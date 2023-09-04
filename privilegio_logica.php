<?php include 'global_pdo/conexion.php';

    $id = $_POST['id'];

  $sql = $pdo->prepare("SELECT Tipo_usuario FROM `usuarios` WHERE id=$id");
  $sql -> execute();

  $muestra = $sql ->fetch();



 if ($muestra['Tipo_usuario'] == 1) {
     
    $privilegio_admin = $pdo->prepare("UPDATE `usuarios` SET `Tipo_usuario`= '2' WHERE id=$id");
    $privilegio_admin ->execute();

 }else{
    
        if ($muestra['Tipo_usuario'] == 2) {
            $privilegio_usuario = $pdo->prepare("UPDATE `usuarios` SET `Tipo_usuario`= '1' WHERE id=$id");
            $privilegio_usuario ->execute();
        }

 }
   

header('location: usuarios_lab.php')
?>