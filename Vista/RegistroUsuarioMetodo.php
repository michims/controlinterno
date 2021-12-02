<?php
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($to,$nameto,$subject,$message)  {
    $from  = "reviewmecuc@gmail.com"; 
    $namefrom = "Review.Me";
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host   = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $from;
    $mail->Password   = "Correo12345";
    $mail->SMTPSecure = "ssl";
    $mail->setFrom($from,$namefrom);
    $mail->Subject  = $subject;
    $mail->isHTML();
    $mail->Body = $message;
    $mail->addAddress($to, $nameto);
    return $mail->send();
  }
$id=$_REQUEST["id"];
$nombre=$_REQUEST["nombre"];
$tel=$_REQUEST["tel"];
$email=$_REQUEST["email"];
$direccion=$_REQUEST["direccion"];
$departamento=$_REQUEST["depa"];


$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->RegistroUsuario($id,$nombre,$tel,$email,$direccion,$departamento);
if($result!=0){
$body="Bienvenido a Review.me.\n Adjuntamos la información necesaria para el inicio de sesión en nuestro sistema:\nUsuario:". $id ."\nClave:". $result;
sendmail($email,$nombre,"Registro Review.me",$body);
echo $result;
}else{
  echo $result;
}

?>