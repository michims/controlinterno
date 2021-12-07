<?php
$id=$_REQUEST["identificacion"];
$clave=$_REQUEST["clave"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->InicioSesion($id,$clave); 
$info="";
//while ($row = mysqli_fetch_array($result)){
//$info= $row['Rol'] ;
//}
echo $result;

?>