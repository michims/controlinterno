<?php
error_reporting(E_ALL ^ E_WARNING); 
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  header('Location: Principal.php');
}else{
$id=$_SESSION['id'];
$rol= $_SESSION['Rol'];
$depa= $_SESSION['departamento'];
$namedepa= $_SESSION['namedepartamento'];

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
$infocombo=$objsm->PeriodosFormularioCombo();

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/styleGeneral.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.highcharts.com/stock/highstock.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts-more.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js" type="text/javascript"> </script>
    <script src="https://code.highcharts.com/modules/data.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/funnel.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/annotations.js" type="text/javascript"></script
    ><script src="https://code.highcharts.com/modules/accessibility.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js" type="text/javascript">
  <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css"> 
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div style="text-align: center;">
    <a href="Perfil.php">
      <img src="img/logo.png" alt="logo" -o-object-fit: cover width="150%" height="160%">
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
        <span class="dashboard">Estadísticas </span>
      </div>
    </nav>

<div class="home-content">
    
  <div class="contenido" style="text-align:center;">

          
          <br>


          <br>
    <form class="form1">
    <input class="un " type="text" align="center" placeholder="Departamento" value="<?php echo $namedepa ?>" name="depa" id="depa" disabled>
    <input class="un " type="hidden" align="center" value="<?php echo $depa ?>" name="iddepa" id="iddepa" >

      </form>

      <table style="display:none" name="barras" id="barras">
       <thead>
        <tr>
          <th>Componente</th>
          <th>Criterio No.1</th>
          <th>Criterio No.2</th>
          <th>Criterio No.3</th>
          <th>Criterio No.4</th>
        </tr>
       </thead><thead>
       </thead><tbody>
       <?php
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

       echo "<tr><td>Ambiente de Control</td><td>".$ambiente2[0]."</td><td>".$ambiente2[1]."</td><td>".$ambiente2[2]."</td><td>".$ambiente2[3]."</td></tr>";
       echo "<tr><td>Valoración de Riesgo</td><td>".$riesgo2[0]."</td><td>".$riesgo2[1]."</td><td>".$riesgo2[2]."</td><td>".$riesgo2[3]."</td></tr>";
       echo "<tr><td>Actividades de control</td><td>".$control2[0]."</td><td>".$control2[1]."</td><td>".$control2[2]."</td><td>".$control2[3]."</td></tr>";
       echo "<tr><td>Sistemas de información</td><td>".$sistemas2[0]."</td><td>".$sistemas2[1]."</td><td>".$sistemas2[2]."</td><td>".$sistemas2[3]."</td></tr>";
       echo "<tr><td>Seguimiento del Sistema de Control Interno</td><td>".$seguimiento2[0]."</td><td>".$seguimiento2[1]."</td><td>".$seguimiento2[2]."</td><td>".$seguimiento2[3]."</td></tr>";


       ?>

       </tbody>
       </table>
         <div id="containerGraficos"  name="containerGraficos">


         </div>
         <br>
         <br>
         <hr>
         <br>
         <br>
         <h3>Reporte de Formulario por Período</h3>
         <br>

      <select class="un " name="opcion" id="opcion" onchange="Info()" required >
        <option value="" disabled selected>Seleccione un período de evaluación</option>
        <?php while ($row = mysqli_fetch_array($infocombo)){
                        echo "<option value=". $row ['IdPeriodo'].">" . $row['FechaInicio']."/".$row['FechaFinal'] . "</option>";
                        }
                        ?>
        </select>
        
<div style="width:50%; margin-left:auto ;margin-right:auto" >

        <table name="tablaperiodo" id="tablaperiodo">
      <thead>
        <tr>
          <th>Componente</th>
          <th>Promedio</th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>
      </tbody>
    </table>
                      </div>
</div>

  
  </section>
  </body>
  <script>

  $(function() {// cualquier cosa que se escriba dentro de esta función, se va a ejecutar apenas cargue la página
    ReporteResultadosComponente();
});
function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });
    }
function Info(){
            
            var op=$("#opcion").val();
          $.ajax({
            url: 'ResumenEstadisticasEncargadoDepMetodo.php?', 
            type: 'POST',
            data:{Opcion:op} , 
            success:function(response)
            { if(response!=""){
              $("#tablaperiodo > tbody").html("");
              $("#tablaperiodo").append(response);
              mensaje("Se han cargado los resultados del departamento para el período de evaluación","success")
            }

              else{
              mensaje("No existen resultados para el departamento","info")

            }
            }

          });
        }

    function ReporteResultadosComponente() {//Recibe this para poder sacar el value y el texto
    var idDepartamento=$("#iddepa").val();
    var nomdepartamento= $("#depa").val();
    // usar idDepartamento como parametro al ajax para realizar la consulta a la BD
    // aquí podés llamar un ajax que te devuelva todos los datos en separados por coma y  pasarlo como la data del gráfico


      var config={// Guardamos todas la configuración del Grafico en una variable
	"title": {
		"text": "Resultados por Componente y Criterio"
	},
	"subtitle": {
		"text": "Departamento "+ nomdepartamento
	},
	"exporting": {},
	"chart": {
		"type": "column",
		"polar": false
	},
	"series": [{ // Especificamos las Series de datos que va a mostrar el gráfico
		"name": "Criterio 1",
		"turboThreshold": 0,
		"marker": {}
	}, {
		"name": "Criterio 2",
		"turboThreshold": 0
	}, {
		"name": "Criterio 3",
		"turboThreshold": 0
	}, {
		"name": "Criterio 4",
		"turboThreshold": 0
	}],
	"plotOptions": {
		"series": {
			"animation": false,
			"dataLabels": {}
		}
	},
	"data": {
    "table":"barras"
	},
	"legend": {},
	"colors": ["#7cb5ec", "#434348", "#90ed7d", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b", "#91e8e1"],
	"tooltip": {},
	"lang": {},
	"credits": {},
  "yAxis": {
    "title": {
      "text": "Puntaje" //Texto del eje Y
    }
  }
}
      $("#containerGraficos").highcharts(config);//Creamos el Highcharts dentro del div llamado containerGRaficos con la configuración creada
   
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





</script>     

</html>

