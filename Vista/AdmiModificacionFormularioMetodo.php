<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

$tipo=$_REQUEST["tipo"];//Recibir el tipo de acción
if ($tipo=="comboatributo"){
$opcion=$_REQUEST["Opcion"];
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$result=$objsm->InfoAtributoComponenteEditar($opcion); 
$info="<option value=''disabled selected>Seleccione un atributo</option>";
while ($row = mysqli_fetch_array($result)){
    $info=$info. "<option value=". $row ['IdCaracteristica'].">" . $row['NombreCaracteristica'] . "</option>";
    }
    
    echo $info;

}

if ($tipo=="InfoTabla"){
    $opcion1=$_REQUEST["Opcion"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->TablaModificacionFormulario($opcion1); 
    $info2="";
    while ($row = mysqli_fetch_array($result)){
        $info2=$info2."<tr><td style='display:none;'>". $row ['IdOpcion']."</td><td>". $row['NombreOpcion']."</td><td>". $row ['ValorOpcion']."</td><td>".
        $row ['Descripcion']."</td><td>".$row ['Evidencia']."</td>".
        "<td><a href='#popup1' class='btnSelect'><i class='bx bxs-pencil bx-sm' ></i></a>&nbsp;<a 
        onclick='infopopup()'></i></a></td></tr>";
        }
        echo $info2;

}


if ($tipo=="Modifica"){
    $id=$_REQUEST["id"];
    $nombre=$_REQUEST["nombre"];
    $val=$_REQUEST["val"];
    $desc=$_REQUEST["desc"];
    $evi=$_REQUEST["evi"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $res=$objsm->ActualizarFormulario($id,$nombre,$val,$desc,$evi); 
    $estado="";
    while ($row = mysqli_fetch_array($res)){
    $estado=$row ['Estado'];
    }
    echo $estado;
}


?>