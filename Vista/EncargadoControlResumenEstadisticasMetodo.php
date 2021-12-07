<?php
error_reporting(E_ALL ^ E_WARNING);

$tipo=$_REQUEST["tipo"];

if($tipo=="otro"){
$depa=$_REQUEST["iddepartamento"];
      require '../Modelo/ConsultasModel.php';
      require_once '../Config.php';
      $objconfig = new Config();
      $objsm =  new ConsultasModel($objconfig);
      $infotabla="";
      $infotabla=$objsm->TablaResultadosForm($depa);
       $ambiente="";
       $riesgo="";
       $control="";
       $sistemas="";
       $seguimiento="";
       while ($row = mysqli_fetch_array($infotabla)){

        if($row ['NombreComponente']=='Ambiente de Control'){
          $ambiente=$ambiente.$row ['ValorOpcion'].";";
        }
        if($row ['NombreComponente']=='Valoración de Riesgo'){
          $riesgo=$riesgo.$row ['ValorOpcion'].";";
        }
        if($row ['NombreComponente']=='Actividades de control'){
          $control=$control.$row ['ValorOpcion'].";";
        }
        if($row ['NombreComponente']=='Sistemas de información'){
          $sistemas=$sistemas.$row ['ValorOpcion'].";";
        }
        if($row ['NombreComponente']=='Seguimiento del Sistema de Control Interno'){
          $seguimiento=$seguimiento.$row ['ValorOpcion'].";";
        }
       }
       $ambiente2=explode(";",$ambiente);
       $riesgo2=explode(";",$riesgo);
       $control2=explode(";",$control);
       $sistemas2=explode(";",$sistemas);
       $seguimiento2=explode(";",$seguimiento);
       $table="<tr><td>Ambiente de Control</td><td>".$ambiente2[0]."</td><td>".$ambiente2[1]."</td><td>".$ambiente2[2]."</td><td>".$ambiente2[3]."</td></tr>";
       $table=$table."<tr><td>Valoración de Riesgo</td><td>".$riesgo2[0]."</td><td>".$riesgo2[1]."</td><td>".$riesgo2[2]."</td><td>".$riesgo2[3]."</td></tr>";
       $table=$table."<tr><td>Actividades de control</td><td>".$control2[0]."</td><td>".$control2[1]."</td><td>".$control2[2]."</td><td>".$control2[3]."</td></tr>";
       $table=$table."<tr><td>Sistemas de información</td><td>".$sistemas2[0]."</td><td>".$sistemas2[1]."</td><td>".$sistemas2[2]."</td><td>".$sistemas2[3]."</td></tr>";
       $table=$table."<tr><td>Seguimiento del Sistema de Control Interno</td><td>".$seguimiento2[0]."</td><td>".$seguimiento2[1]."</td><td>".$seguimiento2[2]."</td><td>".$seguimiento2[3]."</td></tr>";

       echo $table;
      }


      if($tipo=="filtroperiodo"){
        $periodo=$_REQUEST["Periodo"];
        $depa= $_REQUEST["Departamento"];
        require '../Modelo/ConsultasModel.php';
        require_once '../Config.php';
        $objconfig = new Config();
        $objsm =  new ConsultasModel($objconfig);
        $result=$objsm->InfoComponentexPeriodo($periodo,$depa); 
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
    
      
      }


       ?>