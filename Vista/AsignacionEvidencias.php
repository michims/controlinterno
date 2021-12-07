<?php

 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
 error_reporting(E_ALL ^ E_WARNING);
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
$infoperfil=$objsm->ConsultaEmpleadosDepartamento($depa);
$asignaciones=$objsm->ConsultaAsignacionUsuarioDepartamento($depa);
 

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
    <script src="https://code.highcharts.com/stock/highstock.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts-more.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js" type="text/javascript"> </script>
    <script src="https://code.highcharts.com/modules/data.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/funnel.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/annotations.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js" type="text/javascript">
   <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div style="text-align: center;">
    <a href="Perfil.php">
      <img src="img/logo.png" alt="logo" -o-object-fit: cover width="50%" height="100%">
</a>
</div>
<ul class="nav-links" style="display:<?php echo $visibleEmpleadoDep ?>">
        <li>
        </li>
    <li>
          <a href="MenuFormulario.php">
            <i class='bx bxs-file' ></i>
            <span class="links_name">Formulario Autoevaluación</span>
          </a>
        </li>
        <li>
          <a href="MenuResultados.php">
            <i class='bx bxs-bar-chart-alt-2' ></i>
            <span class="links_name">Resultados Departamento</span>
          </a>
        </li>
    
        <li>
        <a href="Ayuda.php">
            <i class='bx bx-help-circle' ></i>
            <span class="links_name">Ayuda</span>
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
          <a href="MenuFormulario.php">
            <i class='bx bxs-file' ></i>
            <span class="links_name">Formulario Autoevaluación</span>
          </a>
        </li>
        <li>
          <a href="MenuResultados.php">
            <i class='bx bxs-bar-chart-alt-2' ></i>
            <span class="links_name">Resultados Departamento</span>
          </a>
        </li>
        <li>
        <a href="AsignacionEvidencias.php">
            <i class='bx bxs-group' ></i>
            <span class="links_name">Asignación de Evidencias</span>
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
        <li>
          <a href="AdmiManejoFormulario.php">
            <i class='bx bxs-file' ></i>
            <span class="links_name">Manejo Formulario Autoevaluación</span>
          </a>
        </li>
        <li>
          <a href="AdmiManejoUsuarios.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Manejo de Usuarios</span>
          </a>
        </li>
        <li>
          <a href="RespuestaContacto.php">
            <i class='bx bx-message-rounded-error' ></i>
            <span class="links_name">Consultas</span>
          </a>
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
    
      <div class="contenido">
        <center>
          <br>
          <br>
          <br>
          <img src="img/logoresultado.png" width="120px" height="100px;">
          <h2>Asignación de Evidencias</h2></center>
        <br>
      <table id="tabla" name="tabla">
      <thead>
        <tr>
          <th>Identificación</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Asignar</th>
        </tr>
      </thead><thead>
      </thead><tbody>
        
      <?php
        while ($row = mysqli_fetch_array($infoperfil)){
  echo "<tr><td>".$row["Identificacion"]."</td><td>".$row["NombreCompleto"]."</td><td>".$row["Email"]."</td><td> <a href='#popup1' class='btnSelect' ><i class='bx bxs-user-check bx-sm' ></i></a></td></tr>";
  }

  ?>
      
      </tbody>


    </table>
    <br>
    <hr>
     <div style="margin-left:auto;margin-right:auto;width:60%;text-align:center;">
    <h3>Asignaciones Pendientes</h3>
    <br>
    <table>
      <thead>
        <tr>
          <th style="display:none">IdAsignacion</th>
          <th>Usuario</th>
          <th>Asignación</th>
          <th>Fecha Respuesta</th>
          <th>Fecha Límite</th>
          <th>Estado</th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>
      <?php
      while ($row = mysqli_fetch_array($asignaciones)){
       $vencimiento=$row["vencimiento"];
       $color="#FFFFF";
       if ($vencimiento=='OK'){
        $color="#5bed3e";
       }else{
        $color="#e34040";
       }
      
       
        echo "<tr style='background-color:".$color."'><td style='display:none'>".$row["idempleadoasignacion"]."</td><td>".$row["idempleado"]."</td><td>".$row["mensajeasignacion"]."</td><td>".$row["fechafinalizacion"]."</td><td>".$row["fechalimiteasignacion"]."</td><td>".$row["estadoasignacion"]."</td><td> <a href=''  onclick='EliminarAsignacion(".$row["idempleadoasignacion"].")'><i class='bx bxs-trash bx-sm' ></i></a></td></tr>";
       }
       ?>
          
          
        </tr>
      </tbody>
    </table>
    </div>
    



    <div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Asignación de Evidencias</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="asignacion" id="asignacion">
      <input type="hidden" id="departamento" name="departamento" value="<?php  echo $depa ?>">
      <input class="un " type="text" id="usuario" name="usuario" required readonly>
      <input class="un " type="date" align="center" placeholder="Fecha Límite"required name="fecha" id="fecha" min="<?php echo date('Y-m-d'); ?>">

      <input class="textsugerencia" type="text" align="center" placeholder="Asignación de Evidencias" required name="asignacion" id="asignacion">
    
      
            
        </form> 
        <center>
        <button class="submit" type="button" onclick="AsignarEvidencia()"  align="center">Asignar Evidencia</button>
        </center>
      <br>
		</div>
	</div>
</div>
    <br>
    <br>


  
    
   
   
       
     
    
    
  </section>

  <script>
  
  $(function() {// cualquier cosa que se escriba dentro de esta función, se va a ejecutar apenas cargue la página
    GraficosEncargadoControlInterno();
    $("#tabla").on('click', '.btnSelect', function() {
      // get the current row
      var currentRow = $(this).closest("tr");

      var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
      $("#usuario").val(col1);
    
      
    });
});
function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

    function GraficosEncargadoControlInterno(){
      var config={
	"title": {
		"text": "Porcentaje por Departamento"
	},
	"subtitle": {
		"text": "Índice General de Madurez"
	},
	"exporting": {},
	"chart": {
		"type": "pie",
		"options3d": {
			"enabled": true,
			"alpha": 45,
			"beta": 0
		},
		"polar": false
	},
	"plotOptions": {
		"pie": {
			"allowPointSelect": true,
			"depth": 35,
			"cursor": "pointer"
		},
		"series": {
			"dataLabels": {
				"enabled": true
			},
			"animation": false
		}
	},
	"series": [{
		"name": "Porcentaje",
		"turboThreshold": 0
	}],
	"data": {
		"table": "graficoGen",
		
	},
	"yAxis": {
		"title": {}
	}
}
$("#contenidoGrafico").highcharts(config);

    }

    function AsignarEvidencia(){
      if (!$('#asignacion')[0].checkValidity()){
            $('#asignacion')[0].reportValidity();
         }else{
           var datos=$('#asignacion').serialize();
              $.ajax({
                url: 'AsignacionEvidenciasMetodo.php?tipo=Asignar', 
                type: 'POST',
                data:datos, // solo le mandamos el id, porque no hay formulario
                success:function(response)
                {
                    mensaje("Se ha realizado la Asignación Correctamente.","success");
                    setTimeout(function(){window.location.href = "AsignacionEvidencias.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                 
        
                }
              });
        
         }
            }


            function EliminarAsignacion(idasignacion){
              $.ajax({
                url: 'AsignacionEvidenciasMetodo.php?tipo=Eliminar', 
                type: 'POST',
                data:{idasigna:idasignacion}, // solo le mandamos el id, porque no hay formulario
                success:function(response)
                {
                    mensaje("Se ha eliminado la Asignación Correctamente.","success");
                    setTimeout(function(){window.location.href = "AsignacionEvidencias.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                 
        
                }
              });

            }
</script>     
</body>
</html>

