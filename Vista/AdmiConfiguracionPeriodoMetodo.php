<?php
$tipo=$_REQUEST["tipo"];//Recibir el tipo de acción
if ($tipo=="Actualizar"){
$inicio=$_REQUEST["inicio"];
$fin=$_REQUEST["fin"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->ActualizarPeriodoFormulario($inicio,$fin); 
echo $result;
}

if ($tipo=="Notificar"){
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $objsm->NotificacionPeriodoCorreos(); 
}


?>