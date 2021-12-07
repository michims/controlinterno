<?php
error_reporting(E_ALL ^ E_WARNING); 
$id=$_REQUEST["iddepa"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->ResultadosaRevision($id); 
/*$info="";
while ($row = mysqli_fetch_array($result)){
$info= $row['IdForm'] ;
}*/
echo $result;

?>