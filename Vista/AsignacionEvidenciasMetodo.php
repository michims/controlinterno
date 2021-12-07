<?php

 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
 error_reporting(E_ALL ^ E_WARNING);
 
 if($_SESSION['id']==''){
  header('Location: Principal.php');
}else{
  $tipo=$_REQUEST["tipo"];
if ($tipo=="Asignar"){
  $departamento=$_REQUEST["departamento"];
  $usuario=$_REQUEST["usuario"];
  $fecha=$_REQUEST["fecha"];
  $asignacion=$_REQUEST["asignacion"];
  require '../Modelo/ConsultasModel.php';
  require_once '../Config.php';
  $objconfig = new Config();
  $objsm =  new ConsultasModel($objconfig);
  $objsm->RegistroAsignacionUsuario($usuario,$asignacion,$fecha,$departamento);
}
if($tipo=="Eliminar"){
  require '../Modelo/ConsultasModel.php';
  require_once '../Config.php';
  $objconfig = new Config();
  $asignacion=$_REQUEST["idasigna"];
  $objsm =  new ConsultasModel($objconfig);
  $objsm->EliminarAsignacionUsuario($asignacion);

} 
 
}
?>


