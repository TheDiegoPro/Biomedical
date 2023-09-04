<?php $mysqli=new mysqli('localhost','root','','farmacia');
        if($mysqli->connect_errno):
            //echo "error al conectarse con Mysql debido al error".$mysqli->connect_error;
        endif;
        ?>