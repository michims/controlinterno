<?php
error_reporting(E_ALL ^ E_WARNING);
$tipo=$_REQUEST["tipo"];//Recibir el tipo de acción
if ($tipo=="update"){
$id=$_REQUEST["id"];
$tel=$_REQUEST["tel"];
$email=$_REQUEST["email"];
$direccion=$_REQUEST["direccion"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$objsm->ActualizarPerfil($id,$tel,$email,$direccion); 
}
if($tipo=="eliminar"){
$id=$_REQUEST["id"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$objsm->EliminarPerfil($id); 
}
?>