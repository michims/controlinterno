<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

$tipo=$_REQUEST["tipo"];//Recibir el tipo de acción
if ($tipo=="comboop"){
$opcion=$_REQUEST["Opcion"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->ComboOpcionAtributo($opcion); 
$info="<option value=''disabled selected>Seleccione una opción</option>";

while ($row = mysqli_fetch_array($result)){
    $info=$info. "<option value=". $row ['IdOpcion'].">" . $row['NombreOpcion'] . "</option>";
    }
    
    echo $info;

}
if ($tipo=="infoop"){

    $opcion=$_REQUEST["infoOpcionatributo"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->OpcionesCaracteristica($opcion); 
    $info="";
    while ($row = mysqli_fetch_array($result)){
        $info=$info. "<tr><td>". $row ['NombreOpcion']."</td><td>" . $row['Descripcion'] . "</td><td>". $row ['Evidencia']."</td></tr>";
        }
    
        echo $info;
}

if ($tipo=="registro"){
    $depa= $_REQUEST['depart'];
    $opcion1=$_REQUEST["atributo"];
    $opcion2=$_REQUEST["opcion"];
    $opcion3=$_REQUEST["evidencia"];
    $opcion5=$_REQUEST["faltante"];
    $opcion6=$_REQUEST["problemas"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result2=$objsm->RegistroResultadoFormulario($opcion1,$depa,$opcion2,$opcion3,$opcion5,$opcion6); 
    echo $result2;
}

if ($tipo=="infoForm"){

    $opcion=$_REQUEST["infoOpcionatributo"];
    $opciondepa=$_REQUEST["infodepa"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->InfoFormDepartamento($opcion,$opciondepa); 
    $info="";
    while ($row = mysqli_fetch_array($result)){
        $info=$info. $row ['IdResultado'] .";". $row['IdCaracteristica'] .";". $row ['IdOpcion'].";". $row ['EvidenciaNecesaria']
       .";". $row ['DocFaltante'].";". $row ['Problemas'];
        }
        echo $info;
    }
    
if ($tipo=="actualizar"){
    $res= $_REQUEST["idresultado"];
    $op=$_REQUEST["opcion"];
    $evid1=$_REQUEST["evidencia"];
    $docfalt=$_REQUEST["faltante"];
    $prob=$_REQUEST["problemas"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $objsm->ActualizarResultadoFormulario($res,$op,$evid1,$docfalt,$prob);
}


?>