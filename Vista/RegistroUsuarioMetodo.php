<?php
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($to,$nameto,$subject,$message)  {
  
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
  $configcorreo=$objsm->ConfigCorreo();
  $email="";
  $host="";
   $pass="";
    while ($row = mysqli_fetch_array($configcorreo)){
   $email=$row["Email"];
  $host=$row["Host"];
  $pass=$row["Password"];
         }
    $from  = $email; 
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
$asunto="";
$body="";
$correo=$objsm->ConsultaCorreoMensajeID(1);//ID de Mensaje 1
while ($row = mysqli_fetch_array($correo)){ 
$asunto=$row["asuntoMensaje"];
$body=$row["detalleMensaje"];
$body=str_replace("%ID%", $id, $body);//Reemplaza %ID% del mensaje por el ID de la variable
$body=str_replace("%CLAVE%", $result, $body);//Reemplaza %CLAVE% por la clave de la variable
}
#$body="Bienvenido a Review.me.\n Adjuntamos la información necesaria para el inicio de sesión en nuestro sistema:\nUsuario:". $id ."\nClave:". $result;
sendmail($email,$nombre,$asunto,$body);
echo $result;
}else{
  echo $result;
}

?>