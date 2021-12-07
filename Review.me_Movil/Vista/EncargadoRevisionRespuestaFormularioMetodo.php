<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
$tipo=$_REQUEST["tipo"];
if ($tipo=="Resultados"){
    $opcion1=$_REQUEST["Opcion"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->RespuestaenRevision($opcion1); 
    $info2="";
    while ($row = mysqli_fetch_array($result)){
        $info2=$info2."<tr><td style='display:none;'>". $row ['IdResultado']."</td><td>". $row ['NombreComponente']."</td><td>".
        $row ['NombreCaracteristica']."</td><td>".$row ['NombreOpcion']."</td><td>".$row ['FechaRegistro']."</td><td>".$row ['Estado']."</td></tr>";
        }
        echo $info2;

}

if ($tipo=="Comentar"){
    $id=$_REQUEST["id"];
    $evi=$_REQUEST["evi"];
    $doc=$_REQUEST["doc"];
    $prob=$_REQUEST["prob"];
    $compro=$_REQUEST["compro"];

    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $objsm->ComentarRespuesta($id,$evi,$doc,$prob,$compro); 
    
}
?>