<?php $username="root";
$password="";
$database="farmacia";

$mysqli= new mysqli("localhost", $username, $password, $database);

	if(mysqli_connect_errno()){
		//echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>