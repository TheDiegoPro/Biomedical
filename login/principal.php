<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if (isset($_SESSION['usuario'])){

        if($_SESSION['usuario']['Tipo_usuario']=='1'){?> 
        
        <h1>ADMINISTRADOR</h1> <?php
    
        }else if($_SESSION['usuario']['Tipo_usuario']=='2'){?>
    
        <h1>USUARIO NORMAL</h1> 
        
    <?php
        }
    
    }

?>
</body>
</html>