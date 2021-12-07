<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  header('Location: Principal.php');
}else{
  $id=$_SESSION['id'];
  $rol= $_SESSION['Rol'];
  $depa= $_SESSION['departamento'];
  
  if($rol=='EmpleadoDep'){
    $visibleEmpleadoDep='auto';
    $visibleEncargadoDep='none';
    $visibleFiscalizador='none';
    $visibleEncargadoControlInt='none';
    $graficoEncargadoControlInt='none';
  }
  
  if($rol=='EncargadoDep'){
    $visibleEmpleadoDep='none';
    $visibleEncargadoDep='auto';
    $visibleFiscalizador='none';
    $visibleEncargadoControlInt='none';
    $graficoEncargadoControlInt='none';
  }
  
  if($rol=='Fiscalizador'){
    $visibleEmpleadoDep='none';
    $visibleEncargadoDep='none';
    $visibleFiscalizador='auto';
    $visibleEncargadoControlInt='none';
    $graficoEncargadoControlInt='none';
  }
  
  if($rol=='EncargadoControlInterno'){
    $visibleEmpleadoDep='none';
    $visibleEncargadoDep='none';
    $visibleFiscalizador='none';
    $visibleEncargadoControlInt='auto';
    $graficoEncargadoControlInt='block';
  }

require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$infotabla="";
$infotabla=$objsm->TablaResultadosForm($depa);
}
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/styleGeneral.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css"> 
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div style="text-align: center;">
    <a href="Perfil.php">
      <img src="img/logo.png" alt="logo" style="center" -o-object-fit: cover width="150%" height="160%" >
</a>



</div>
<ul class="nav-links" style="display:<?php echo $visibleEmpleadoDep ?>">
        <li>
        </li>
        <li>
          <a href="MenuResultados.php">
            <i class='bx bxs-bar-chart-alt-2' ></i>
            <span class="links_name">Resultados Departamento</span>
          </a>
        </li>
    
        <li class="log_out">
          <a href="Principal.php">
            <i class='bx bxs-door-open'></i>
            <span class="links_name">Salir</span>
          </a>
        </li>
      </ul>

    <ul class="nav-links" style="display:<?php echo $visibleEncargadoDep ?>">
        <li>
        </li>
        <li>
          <a href="MenuResultados.php">
            <i class='bx bxs-bar-chart-alt-2' ></i>
            <span class="links_name">Resultados Departamento</span>
          </a>
        </li>
        <li class="log_out">
          <a href="Principal.php">
            <i class='bx bxs-door-open'></i>
            <span class="links_name">Salir</span>
          </a>
        </li>
      </ul>

      <ul class="nav-links"style="display:<?php echo $visibleFiscalizador ?>">
        <li>
        </li>
        <li class="log_out">
          <a href="Principal.php">
            <i class='bx bxs-door-open'></i>
            <span class="links_name">Salir</span>
          </a>
        </li>
      </ul>

      <ul class="nav-links" style="display:<?php echo $visibleEncargadoControlInt ?>">
        <li>
        </li>
        <li>
          <a href="MenuRevisionRespuestasFormulario.php">
            <i class='bx bxs-bar-chart-alt-2' ></i>
            <span class="links_name">Evaluación de Resultados</span>
          </a>
        </li>
        <li class="log_out">
          <a href="Principal.php">
            <i class='bx bxs-door-open'></i>
            <span class="links_name">Salir</span>
          </a>
        </li>
      </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"></span>
      </div>
    </nav>

    <div class="home-content">
    
      <div class="contenidoresultado">
        <center>
          <br>
          <br>
          <br>
          <img src="img/logoresultado.png" width="100px" height="100px;">
          <h2>Resultados Evaluación</h2></center>
        <br>
        <table>
       <thead>
        <tr>
          <th>Componente</th>
          <th>Característica </th>
          <th>Opción</th>
          <th>Valor Opción</th>   
          <th>Estado Evaluación</th>
          <th></th>
        </tr>
       </thead><thead>
       </thead><tbody>
        
       <?php 
       $count=0;
       $suma=0;
       $prom=0;
       $sumambiente=0;
       $sumriesgo=0;
       $sumactividades=0;
       $suminfo=0;
       $sumcontrol=0;
       $ambiente=0;
       $riesgo=0;
       $actividades=0;
       $info=0;
       $control=0;
       if(empty($infotabla)!=1) {
        while ($row = mysqli_fetch_array($infotabla)){
          $count=$count+1;
          $suma=$suma+$row ['ValorOpcion'];

          if($row ['NombreComponente']=='Ambiente de Control'){
            $sumambiente=$sumambiente+$row ['ValorOpcion'];
          }
          if($row ['NombreComponente']=='Valoración de Riesgo'){
            $sumriesgo=$sumriesgo+$row ['ValorOpcion'];
          }
          if($row ['NombreComponente']=='Actividades de control'){
            $sumactividades=$sumactividades+$row ['ValorOpcion'];
          }
          if($row ['NombreComponente']=='Sistemas de información'){
            $suminfo=$suminfo+$row ['ValorOpcion'];
          }
          if($row ['NombreComponente']=='Seguimiento del Sistema de Control Interno'){
            $sumcontrol=$sumcontrol+$row ['ValorOpcion'];
          }

          $estado=$row ['Estado'];
          $color='#fffff';#blanco

          if($estado=='Revisado'){
            $color='#b4f78d';
          }
          if($estado=='En Revisión'){
            $color='#b3e7ff';
          }




          echo "<tr style='background-color:".$color."'><td>". $row ['NombreComponente']."</td><td>" . $row['NombreCaracteristica'] . "</td><td>" . $row['NombreOpcion'] ."</td><td>". 
          $row ['ValorOpcion']."</td><td>". $row ['Estado']."</td></tr>";


         }
         if ($count!=0 || $suma!=0){
         $prom=$suma/$count;

         if($sumambiente!=0){
           $ambiente=$sumambiente/4;
         }

         if($sumriesgo!=0){
           $riesgo=$sumriesgo/4;

        }

        if($sumactividades!=0){
          $actividades=$sumactividades/4;
        }

        if($suminfo!=0){
          $info=$suminfo/4;
        }
        if($sumcontrol!=0){
          $control=$sumcontrol/4;
        }

         }
        }
        

       ?>

          </tbody>
        </table>
        <input class="un " type="hidden" align="center" value="<?php echo $depa ?>" name="depa" id="depa">
        <input class="un " type="hidden" align="center" value="<?php echo $count ?>" name="cuenta" id="cuenta">
        <center>
          <br>
          <br>
          <div>

          <br>
          <br>
        </div>
          <hr>
          <br>

          <table>
      <thead>
        <tr>
          <th>Componente</th>
          <th>Indice de Madurez Promedio</th>
        </tr>
      </thead><thead>
      </thead><tbody>
        <tr>
          <td>Ambiente de Control</td>
          <td><?php echo $ambiente;?></td>
        </tr>
        <tr>
          <td>Valoración de Riesgo</td>
          <td><?php echo $riesgo;?></td>
        </tr>
        <tr>
          <td>Actividades de Control</td>
          <td><?php echo $actividades;?></td>
        </tr>
        <tr>
          <td>Sistemas de Información</td>
          <td><?php echo $info;?></td>
        </tr>
        <tr>
          <td>Seguimiento del Sistema de Control Interno</td>
          <td><?php echo $control;?></td>
        </tr>
        <?php 
          $color='#fffff';
          if($prom<60){
            $color='#e34040';
          }
          if($prom>=60){
            $color='#5bed3e';
          }
          ?>
        <tr style="background-color:<?php echo $color?>">

          <td><b>Índice de Madurez Promedio General</b></td>
          <td><b><?php echo $prom;?></b></td>
        </tr>
      </tbody>
    </table>
<hr>
        </center>
      </div>
      
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

    function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }

    function Revisar(){
            
           var cuenta=$('#cuenta').val();
           if( cuenta <19){
            mensaje("El formulario no ha sido completado para enviar a revisión.","warning");

           }else{
           var datos=$('#depa').val();
      $.ajax({
        url: 'ResultadosEvaluacionMetodo.php', 
        type: 'POST',
        data:{iddepa:datos} , // The form with the file inputs.
        success:function(response)
        {
            mensaje("Se ha enviado la información a revisión.","success");
            setTimeout(function(){window.location.href = "";}, 2000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje

        }
      });
           }

    
    }
</script>     
</body>
</html>
