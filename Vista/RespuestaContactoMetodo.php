<?php
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$id=$_REQUEST["idForm"];
$email=$_REQUEST["email"];
$respuesta=$_REQUEST["respuesta"];
    $objsm->ActualizarConsulta($id);
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
    $mail->Subject  = "Respuesta a Consulta Review.me";
    $mail->isHTML();
    $mail->Body = $respuesta;
    $mail->addAddress($email, $email);
    $mail->send();

?>