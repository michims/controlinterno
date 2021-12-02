<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  header('Location: Principal.php');
}else{
$id=$_SESSION['id'];
$rol= $_SESSION['Rol'];
$depa= $_SESSION['departamento'];

if($rol=='EncargadoDep'){
  $visibleEncargadoDep='auto';
  $visibleFiscalizador='none';
  $visibleEncargadoControlInt='none';
}

if($rol=='Fiscalizador'){
  $visibleEncargadoDep='none';
  $visibleFiscalizador='auto';
  $visibleEncargadoControlInt='none';
}

if($rol=='EncargadoControlInterno'){
  $visibleEncargadoDep='none';
  $visibleFiscalizador='none';
  $visibleEncargadoControlInt='auto';
}

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
      <img src="img/logo.png" alt="logo" -o-object-fit: cover width="50%" height="100%">
</a>
<</div>
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
        <span class="dashboard">Estadísticas </span>
      </div>
    </nav>

<div class="home-content">
    
  <div class="contenido" style="text-align:center;">

          
          <br>


          <br>
    <form class="form1">
    <input class="un " type="text" align="center" placeholder="Departamento" value="" name="depa" id="depa" disabled>
    <input class="un " type="hidden" align="center" value="<?php echo $depa ?>" name="iddepa" id="iddepa" >

      </form>
         <div id="containerGraficos"  name="containerGraficos">


         </div>
         <br>
         <br>
         <div id="containerperiodos" name="containerperiodos" >
    
    </div>
  
</div>

  
  </section>
  </body>
  <script>

  $(function() {// cualquier cosa que se escriba dentro de esta función, se va a ejecutar apenas cargue la página
    ReporteResultadosComponente();
    comparativaperiodos();
});
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
	"data": {//Aquí agregamos la data que va a contener el gráfico, puede enviarsele como un CSV, Si armas un CSV exactamente al del ejemplo pero con la info de la base de datos, te funciona bien
		"csv": "\"Componente\";\"Criterio 1\";\"Criterio 2\";\"Criterio 3\";\"Criterio 4\"\n\"Ambiente de Control\";10;15;10;20\n\"Valoración del riesgo\";20;20;20;20\n\"Actividades de control\";20;20;20;20\n\"Sistemas de información\";20;20;20;20\n\"Seguimiento del SCI\";20;20;20;20",
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
		"csv": "\"Column 1\";\"Column 2\"\n\"Periodo1\";60\n\"Periodo2\";75\n\"Periodo3\";90\n\"Periodo4\";80",
		"googleSpreadsheetKey": false,
		"googleSpreadsheetWorksheet": false
	},
	"yAxis": {
		"title": {
			"text": "Índice de Madurez"
		}
	},
	"colors": ["#ff6f00", "#434348", "#90ed7d", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b", "#91e8e1"]
};

$("#containerperiodos").highcharts(config);
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
</script>     

</html>

