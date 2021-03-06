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
$infotabla=$objsm->ResultadosDepartamento();
$departamento=$objsm->ComboRegistroUsuario();
$departamento2=$objsm->ComboRegistroUsuario();
$periodos=$objsm->PeriodosFormulario();

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
    <script src="https://code.highcharts.com/modules/solid-gauge.js" type="text/javascript"></script>
 

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
            <span class="links_name">Formulario Autoevaluaci??n</span>
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
            <span class="links_name">Formulario Autoevaluaci??n</span>
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
            <span class="links_name">Asignaci??n de Evidencias</span>
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
            <span class="links_name">Manejo Formulario Autoevaluaci??n</span>
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
            <span class="links_name">Evaluaci??n de Resultados</span>
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
    
    
  <div class="contenido" style="text-align:center;">
  
  <h3>Reporte de Formulario por Per??odo</h3>
         <br>

      <select class="un " name="periodo" id="periodo" style="width:30%" required >
        <option value="" disabled selected>Seleccione un per??odo de evaluaci??n</option>
        <?php while ($row = mysqli_fetch_array($infocombo)){
                        echo "<option value=". $row ['IdPeriodo'].">" . $row['FechaInicio']."/".$row['FechaFinal'] . "</option>";
                        }
                        ?>
        </select>
        <br>
        <select class="un " name="opciondepa" id="opciondepa" style="width:30%" required >
        <option value="" disabled selected>Seleccione un Departamento</option>
        <?php while ($row = mysqli_fetch_array($departamento)){
                        echo "<option value=". $row ['IdDepartamento'].">" . $row['NombreDepartamento'] . "</option>";
                        }
                        ?>
        </select>
        <br>

        <button class="submit" type="button" onclick="Infoperiodo()"  align="center" style="width:20%">Buscar</button>
        <br>
        <br>
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
  <br>
  <hr>
  <br>
          <h3>Comparativa Promedio General Empresa</h3>
          <br>
          <table style="display:none" name="compgen" id="compgen">
       <thead>
        <tr>
          <th>Periodo</th>
          <th>Puntaje</th>
        </tr>
       </thead><thead>
       </thead><tbody>
       <?php while ($row = mysqli_fetch_array($periodos)){
      echo "<tr><td>".$row["FechaInicio"]."/".$row["FechaFinal"]."</td><td>".$row["PromEmpresa"]."</td></tr>";
       }
?>
       </tbody>
          </table>

         
  <div id="containerperiodos" name="containerperiodos" >
    
    </div>
          <br>
          <h3>Resultados formulario por Departamento</h3>
          <br>
          <table style="display:none" name="graficoDep" id="graficoDep">
       <thead>
        <tr>
          <th>Departamento</th>
          <th>Puntaje</th>
        </tr>
       </thead><thead>
       </thead><tbody>
       <?php while ($row = mysqli_fetch_array($infotabla)){
      echo "<tr><td>".$row["NombreDepartamento"]."</td><td>".$row["Puntaje"]."</td></tr>";
       }
        ?>
       </tbody>
          </table>

    
    <div id="containerGraficosDptos" name="containerGraficosDptos" >
    
    </div>
<hr>
<br>
<br>
<h3>Resultados Formulario para Departamento por Componente</h3>
          <br>
    <form class="form1">
      <select class="un " name="opcion" id="opcion" onchange="ReporteResultadosComponente(this);" required >
        <option value="" disabled selected>Seleccione un departamento Departamento</option>
        <?php while ($row = mysqli_fetch_array($departamento2)){
                        echo "<option value=". $row ['IdDepartamento'].">" . $row['NombreDepartamento'] . "</option>";
                        }
                        ?>
        </select>

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
      

       </tbody>
       </table>
         <div id="containerGraficos"  name="containerGraficos">


         </div>

         <div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Desglose Informaci??n Componente</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <table  style="width:50%;"name="tablaperiodogen" id="tablaperiodogen">
      <thead>
        <tr>
          <th style="width:50%;"><div style="width:50%">Caracter??stica</div></th>
          <th>Opci??n</th>
          <th>Valor</th>
        </tr>
      </thead><thead>
      </thead><tbody>
      </tbody>
    </table>
     
            
        </form> 
       
      <br>
		</div>
	</div>
  </div>
  
</div>


  
  </section>
  </body>
  <script>

  $(function() {// cualquier cosa que se escriba dentro de esta funci??n, se va a ejecutar apenas cargue la p??gina
    ReporteResultadoComparativo();
    comparativaperiodos();//Cargamos el reporte comparativo apenas entramos a la p??gina
});

function Infoperiodo(){
            
            var op1=$("#periodo").val();
            var op2=$("#opciondepa").val();
          $.ajax({
            url: 'EncargadoControlResumenEstadisticasMetodo.php?tipo=filtroperiodo', 
            type: 'POST',
            data:{Periodo:op1,Departamento:op2} , 
            success:function(response)
            { if(response!=""){
              $("#tablaperiodo > tbody").html("");
              $("#tablaperiodo").append(response);
              mensaje("Se han cargado los resultados del departamento para el per??odo de evaluaci??n","success")
            }

              else{
              mensaje("No existen resultados para el departamento","info")
              $("#tablaperiodo > tbody").html("");

            }
            }

          });
        }

    function ReporteResultadosComponente(sel) {//Recibe this para poder sacar el value y el texto
    var idDepartamento=sel.value;
    var nomdepartamento= $(sel).find('option:selected').text();
    $.ajax({
        url: 'EncargadoControlResumenEstadisticasMetodo.php?tipo=otro', 
        type: 'POST',
        data:{iddepartamento:idDepartamento} , // The form with the file inputs.
        success:function(response)
        { 
          $("#barras > tbody").html("");
              $("#barras").append(response);
              GraficoReporteResultadosComponentes(nomdepartamento);
        }
      });
    }
    function comparativaperiodos(){
   var config=
   {
	"title": {
		"text": "Comparativa por periodos"
	},
	"subtitle": {
		"text": ""
	},
	"exporting": {},
	"chart": {
		"type": "line"
	},
	"series": [{
		"name": "Column 2",
		"turboThreshold": 0
	}],
	"plotOptions": {
		"series": {
			"animation": false
		}
	},
	"data": {
		"table": "compgen"
	},
	"yAxis": {
		"title": {
			"text": "??ndice de Madurez"
		}
	},
	"colors": ["#ff6f00", "#434348", "#90ed7d", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b", "#91e8e1"]
};

$("#containerperiodos").highcharts(config);
 }
    
  function GraficoReporteResultadosComponentes(nomdepartamento){
      var config={// Guardamos todas la configuraci??n del Grafico en una variable
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
	"series": [{ // Especificamos las Series de datos que va a mostrar el gr??fico
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
	"data": {//Aqu?? agregamos la data que va a contener el gr??fico, puede enviarsele como un CSV, Si armas un CSV exactamente al del ejemplo pero con la info de la base de datos, te funciona bien
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
      $("#containerGraficos").highcharts(config);//Creamos el Highcharts dentro del div llamado containerGRaficos con la configuraci??n creada
   


    }

    function ReporteResultadoComparativo(){
      var config={
	"title": {
		"text": "Comparativo entre Departamentos"
	},
	"subtitle": {
		"text": "??ndice de Madurez"
	},
	"exporting": {},
	"chart": {
		"type": "column",
		"margin": 75,
		
		"polar": false
	},
	"plotOptions": {
		"column": {
			"depth": 25
		},
		"series": {
			"animation": false,
			"dataLabels": {}
		}
	},
	"series": [{ // Aqui se agregan las series que va a mostrar el gr??fico en el eje Y
		"name": "Puntaje",
		"turboThreshold": 0,
		"marker": {},
		"color": "#f57c00"
	}],
	"data": {
		"table": "graficoDep"
	},
	"yAxis": {
		"title": {
			"text": "??ndice Promedio"
		}
	},
	"legend": {},
	"tooltip": {},
	"lang": {},
	"credits": {}
}

      $("#containerGraficosDptos").highcharts(config);//Creamos el Highcharts dentro del div llamado containerGRaficos con la configuraci??n creada
   
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

    function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }
    function  cargacomp(componente){

InfoGen(componente);
}
function InfoGen(comp){
      
      var op=$("#opciondepa").val();
    $.ajax({
      url: 'ResumenEstadisticasEncargadoDepMetodo.php?tipo=General', 
      type: 'POST',
      data:{Opcion:op,componente:comp} , 
      success:function(response)
      { if(response!=""){
     
        $("#tablaperiodogen > tbody").html("");
        $("#tablaperiodogen").append(response);
        mensaje("Se han cargado los resultados del componente para el per??odo de evaluaci??n","success")
      }

        else{
        mensaje("No existen resultados para el departamento","info")

      }
      }

    });
  }
</script>     

</html>

