<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
$tipo=$_REQUEST["tipo"];
    $opcion=$_REQUEST["Opcion"];
    $depa= $_SESSION['departamento'];

    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    if ($tipo=="Reporte"){
    $result=$objsm->InfoComponentexPeriodo($opcion,$depa); 
    $info2="";
    $suma=0;
    $cuenta=0;
    while ($row = mysqli_fetch_array($result)){
        $info2=$info2."<tr><td>". $row ['NombreComponente']."</td><td>". round($row['Promedio'],2)."</td><td><a href='#popup1' onclick='cargacomp(\"". $row ['NombreComponente']."\")' class='btnSelect' ><i class='bx bx-file-find bx-sm' ></i></a></td></tr>";
        $suma=$suma+$row['Promedio'];
        $cuenta=$cuenta+1;
        }
        if($cuenta>0){
        $prom=$suma/$cuenta;
        $color='#fffff';
        if($prom<60){
            $color='#EB092A';
        }else{
            $color='#9BEB09';
        }
        $info2=$info2."<tr style='background-color:".$color."'><td><b>Promedio Departamento</b></td><td><b>".$prom."</b></td><td></td></tr>";
        }
        echo $info2;
    }
    if ($tipo=="General"){
        $info2="";
        $componente=$_REQUEST["componente"];
        $result=$objsm->InfoComponentexPeriodoGen($opcion,$depa); 
        while ($row = mysqli_fetch_array($result)){
            if($componente==$row ['NombreComponente']){
            $info2=$info2."<tr><td>". $row ['NombreCaracteristica']."</td><td>". $row['NombreOpcion']."</td><td>". $row['ValorOpcion']."</td></tr>";
            }
        }
            echo $info2;

        }


?>