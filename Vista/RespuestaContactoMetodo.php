<?php
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$tipo=$_REQUEST["tipo"];
if($tipo=="Respuesta"){
$id=$_REQUEST["idForm"];
$email=$_REQUEST["email"];
$respuesta=$_REQUEST["respuesta"];
    $objsm->ActualizarConsulta($id);
    $configcorreo=$objsm->ConfigCorreo();
				$cuenta="";
				$host="";
				 $pass="";
				  while ($row = mysqli_fetch_array($configcorreo)){
				 $cuenta=$row["Email"];
				$host=$row["Host"];
				$pass=$row["Password"];
					   }
    $from  = $cuenta; 
    $namefrom = "Review.Me";
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host   = $host;
    $mail->Port       = 465;
    $mail->Username   = $from;
    $mail->Password   = $pass;
    $mail->SMTPSecure = "ssl";
    $mail->setFrom($from,$namefrom);
    $mail->Subject  = "Respuesta a Consulta Review.me";
    $mail->isHTML();
    $mail->Body = $respuesta;
    $mail->addAddress($email, $email);
    $mail->send();
}
if($tipo=="ActualizarMensaje"){
   
    $idMensaje=$_REQUEST["idMensaje"];
$asunto=$_REQUEST["asunto"];
$mensaje=$_REQUEST["mensaje"];
    $objsm->ActualizarMensaje($idMensaje,$asunto,$mensaje);
}
if($tipo=="ActualizarCorreo"){
$email=$_REQUEST["configemail"];
$host=$_REQUEST["host"];
$password=$_REQUEST["clave"];
$objsm->ModificarConfigCorreo($email,$host,$password);
}

?>