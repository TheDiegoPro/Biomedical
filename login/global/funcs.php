<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function isNull($nombre,$user,$pass,$pass_con,$correo)
{
	if (strlen(trim($nombre)) <1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($correo)) < 1) {
		return true;
	} else {
		return false;
	}
}

function isEmail($correo)
{
	if (filter_var($correo,FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function validaPassword($var1,$var2)
{
	if (strcmp($var1,$var2)!== 0) {
		return false;
	} else {
		return true;
	}
}

function minMax($min,$max,$valor)
{
	if(strlen(trim($valor))<$min) {
		return true;
	} else if (strlen(trim($valor))>$max){
		return true;
	}else{
		return false;
	}
}

function usuarioExiste($rif)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE rif = ? LIMIT 1");
	$stmt->bind_param("s",$rif);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num>0){
		return true;
	} else {
		return false;
	}
}

function emailExiste($correo)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1");
	$stmt->bind_param("s",$correo);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num>0){
		return true;
	} else {
		return false;
	}
}

function generateToken()
{
	$gen=md5(uniqid(mt_rand(),false));
	return $gen;
}

function hashPassword($password)
{
	$hash=password_hash($password,PASSWORD_DEFAULT);
	return $hash;
}

function resultBlock($errors)
{
	if (count($errors)>0) {

		foreach ($errors as $error){
			echo $error.".";
		};
	}
}

function registraUsuario($nombre,$rif,$estado,$telefono,$postal,$correo,$foto,$password,$direccion,$activo,$token,$tipo_usuario)
{
	global $mysqli;

	$stmt = $mysqli->prepare("INSERT INTO usuarios (nombre,rif,estado,telefono,postal,email,foto,password,direccion,Tipo_usuario,activacion,token) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param('sisssssssiis',$nombre,$rif,$estado,$telefono,$postal,$correo,$foto,$password,$direccion,$tipo_usuario,$activo,$token);
	

	if($stmt->execute()){
		return $mysqli->insert_id;
		$stmt->close();
	}else{
		return 0;	
	}
}

//ENVIO DE CORREO UTILIZANDO PROTOCOLO SMTP Y LA LIBRERIA PHPMailer
function enviarEmail($correo,$nombre,$asunto,$cuerpo)
{
	/*$_SERVER['DOCUMENT_ROOT'].*/
	/*$_SERVER['DOCUMENT_ROOT'].*/
	/*$_SERVER['DOCUMENT_ROOT'].*/
	require 'mail/Exception.php';
	require 'mail/PHPMailer.php';
	require 'mail/SMTP.php';

	$mail=new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug=1; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
	$mail->Host="smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
	$mail->Port=587; // TLS only
	$mail->SMTPSecure='tls'; // ssl is deprecated
	$mail->SMTPAuth=true;
	$mail->Username="biomedicalcorreo@gmail.com"; // email
	$mail->Password="Joseantonio1966"; // password
	$mail->setFrom('biomedicalcorreo@gmail.com', 'Biomedical'); // From email and name
	$mail->addAddress($correo, $nombre); // to email and name
	$mail->Subject=$asunto;
	$mail->msgHTML($cuerpo); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
	$mail->AltBody='HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
	// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
	$mail->smtpConnect(['ssl'=>['verify_peer'=>false,'verify_peer_name'=>false,'allow_self_signed'=>true]]);

	if(!$mail->send()){
		echo "Mailer Error: ".$mail->ErrorInfo;
		return false;
	}else{ 
		return true;
	}
}

function validaIdToken($id,$token)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
	$stmt->bind_param("is", $id,$token);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if($rows>0){
		$stmt->bind_result($activacion);
		$stmt->fetch();

		if($activacion==1){
			$msg = "La cuenta ya se activo anteriormente.";
		}else{
			if (activarUsuario($id)){
				$msg = 'Cuenta activada.';
			} else {
				$msg = 'Error al Activar Cuenta';
			}
		}
	} else {
		$msg = 'No existe el registro para activar.';
	}
	return $msg;
}

function activarUsuario($id)
{
	global $mysqli;

	$stmt=$mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
	$stmt->bind_param('i',$id);
	$result=$stmt->execute();
	$stmt->close();
	return $result;
}

function isNullLogin($usuario,$password)
{
	if (strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1) {
		return true;
	} else {
		return false;
	}
}

//LOGIN
function login($rif,$password)
{
	global $mysqli;
	$errors = array();

	$usuarios = $mysqli->query("SELECT id, nombre, Tipo_usuario FROM usuarios WHERE rif = '" . $rif . "'|| email = '" . $rif . "'
    AND password = '" . $password . "' ");

	$datos = $usuarios->fetch_assoc();

	$stmt = $mysqli->prepare("SELECT id, Tipo_usuario, password FROM usuarios WHERE rif = ? || email = ? LIMIT 1");
	$stmt->bind_param("is",$rif,$rif);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if($rows>0){

		if(isActivo($rif)){

			$stmt->bind_result($id,$id_tipo,$passwd);
			$stmt->fetch();

			$validaPassw = validaPassword($password,$passwd);
			
			if($validaPassw) {

				lastSession($id);
				$_SESSION['usuario']=$datos;

				//header('location:index.php');
			}else{
			$errors="La contrase&ntilde;a es incorrecta";
			}
		}else{
			$errors='El usuario no esta activo';
		}
	}else{
		$errors="El Rif no existe";
	}
	return $errors;
}

function lastSession($id)
{
	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuarios SET fecha_Registro=NOW(), token_password='0', password_request=0 WHERE id = ?");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->close();
}

function isActivo($rif)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE rif = ? || email = ? LIMIT 1");
	$stmt->bind_param('is', $rif,$usuario);
	$stmt->execute();
	$stmt->bind_result($activacion);
	$stmt->fetch();

	if($activacion==1){
		return true;
	}else{
		return false;
	}
}

//GENERACION DE TOKEN AL RECUPERAR CONTRASEÑA
function generaTokenPass($user_id)
{
	global $mysqli;

	$token=generateToken();

	$stmt=$mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
	$stmt->bind_param('si', $token,$user_id);
	$stmt->execute();
	$stmt->close();

	return $token;
}

function getValor($campo,$campoWhere,$valor)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
	$stmt->bind_param('s', $valor);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if($num>0){
		$stmt->bind_result($_campo);
		$stmt->fetch();
		return $_campo;
	}else{
		return null;
	}
}

function getPasswordRequest($id)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->bind_result($_id);
	$stmt->fetch();

	if($_id == 1){
		return true;
	}else{
		return null;
	}
}

function verificaTokenPass($user_id,$token)
{

	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
	$stmt->bind_param('is', $user_id, $token);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if($num > 0){
		$stmt->bind_result($activacion);
		$stmt->fetch();
		if ($activacion ==1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function cambiaPassword($password,$user_id,$token)
{

	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='0', password_request=0 WHERE id = ? AND token_password = ?");
	$stmt->bind_param('sis', $password, $user_id, $token);

	if($stmt->execute()){
		return true;
	} else {
		return false;
	}
}