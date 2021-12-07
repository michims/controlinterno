<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

    $opcion=$_REQUEST["Opcion"];
    $depa= $_SESSION['departamento'];
    require '../Modelo/ConsultasModel.php';
    require_once '../Config.php';
    $objconfig = new Config();
    $objsm =  new ConsultasModel($objconfig);
    $result=$objsm->InfoComponentexPeriodo($opcion,$depa); 
    $info2="";
    $suma=0;
    $cuenta=0;
    while ($row = mysqli_fetch_array($result)){
        $info2=$info2."<tr><td>". $row ['NombreComponente']."</td><td>". round($row['Promedio'],2)."</td></tr>";
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
        $info2=$info2."<tr style='background-color:".$color."'><td><b>Promedio Departamento</b></td><td><b>".$prom."</b></td></tr>";
        }
        echo $info2;


?>