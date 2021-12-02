<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

$tipo=$_REQUEST["tipo"];//Recibir el tipo de acción

if ($tipo=="Info"){
    $op=$_REQUEST["Opcion"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->ManejoUsuarios($op); 
    $info2="";
    while ($row = mysqli_fetch_array($result)){
        $info2=$info2."<tr><td>". $row ['Identificacion']."</td><td>". $row['NombreCompleto']."</td><td>". $row ['Telefono']."</td><td>".
        $row ['Email']."</td><td>".$row ['Direccion']."</td><td>".$row ['RolEmpleado']."</td>".
        "<td><a href='#popup1' class='btnSelect'><i class='bx bxs-pencil bx-sm' ></i></a>&nbsp;<a 
        onclick='infopopup()'></i></a></td></tr>";
        }
        echo $info2;
}


if($tipo=="Elimina"){
    $id=$_REQUEST["Opcion"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $objsm->EliminarPerfil($id); 

}

if ($tipo=="Actualiza"){
    $id=$_REQUEST["id"];
    $tel=$_REQUEST["tel"];
    $email=$_REQUEST["email"];
    $direc=$_REQUEST["direccion"];
    $rol=$_REQUEST["rol"];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $objsm->ActualizarUsuario($id,$tel,$email,$direc,$rol); 
    }
?>