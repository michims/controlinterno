<?php
$nombre=$_REQUEST["nombre"];
$email=$_REQUEST["email"];
$consulta=$_REQUEST["consulta"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->RegistroFormContacto($nombre,$email,$consulta); 
/*$info="";
while ($row = mysqli_fetch_array($result)){
$info= $row['IdForm'] ;
}*/
echo $result;

?>