<?php include 'global_pdo/conexion.php';

    $id = $_POST['id'];

  $sql = $pdo->prepare("SELECT status FROM `ventas` WHERE id=$id");
  $sql -> execute();

  $muestra = $sql ->fetch();



 if ($muestra['status'] == 'PENDIENTE') {
     
    $privilegio_admin = $pdo->prepare("UPDATE `ventas` SET `status`= 'APROBADO' WHERE id=$id");
    $privilegio_admin ->execute();

 }else{
    
        if ($muestra['status'] == 'APROBADO') {
            $privilegio_usuario = $pdo->prepare("UPDATE `ventas` SET `status`= 'PENDIENTE' WHERE id=$id");
            $privilegio_usuario ->execute();
        }

 }
   

header('location: ventas_lab.php')
?>