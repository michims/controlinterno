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
$infoperfil=$objsm->PerfilUsuario($id);
$nombre="";
$tel="";
$mail="";
$direc="";
$departamento="";
 while ($row = mysqli_fetch_array($infoperfil)){
  $nombre=$row ['NombreCompleto'];
  $tel=$row ['Telefono'];
  $mail=$row ['Email'];
  $direc=$row ['Direccion'];
  $departamento=$row ['NombreDepartamento'];
  }
$infotabla="";
$infotabla=$objsm->ResultadosDepartamento();
$deptos=$objsm->ComboRegistroUsuario();
$cantidad=mysqli_num_rows($deptos);
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
        <span class="dashboard"></span>
      </div>
    </nav>

    <div class="home-content">
    
      <div class="contenido">
        <center>
          <br>
          <br>
          <br>
          <img src="img/profile.png" width="100px" height="100px;">
          <h2>Información de Usuario</h2></center>
        <br>
      <table>
      <thead>
        <tr>
          <th>Identificación</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th>Dirección</th>
          <th>Departamento</th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>
        <tr>
          <td><?php echo $id;?></td>
          <td><?php echo $nombre;?></td>
          <td><?php echo $tel;?></td>
          <td><?php echo $mail;?></td>
          <td><?php echo $direc;?></td>
          <td><?php echo $departamento;?></td>          
        </tr>
      </tbody>
    </table>


    <br>
    <br>
    <div style="text-align:center;display:<?php echo $graficoEncargadoControlInt ?>"  >
    <br>
    <h2>Información General por Departamento</h2></center>
    </div>
    <table style="display:none" name="graficoGen" id="graficoGen">
       <thead>
        <tr>
          <th>Departamento</th>
          <th>Porcentaje</th>
        </tr>
       </thead><thead>
       </thead><tbody>
       <?php 
       $sum=0;
      
       $promediogen=0;
       while ($row = mysqli_fetch_array($infotabla)){
        $sum=$sum+$row["Puntaje"];
        $promediogen=$sum/$cantidad;
       
       }
       $infotabla2=$objsm->ResultadosDepartamento();
       while ($row = mysqli_fetch_array($infotabla2)){
        $temp=$row["Puntaje"]/$cantidad;
        
        $porc=($temp*100)/$promediogen;
        
        echo "<tr><td>".$row["NombreDepartamento"]."</td><td>".$porc."</td></tr>";
       }
        ?>
       </tbody>
          </table>
    <div id="contenidoGrafico" style="display:<?php echo $graficoEncargadoControlInt ?>" >
    <hr>
    </div>
       
      </div>
      
    </div>
    <div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Modificar Información</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="perfil" id="perfil">
        <input class="un " type="text" align="center" placeholder="Identificación" name="id" id="id" value="<?php echo $id;?>" readonly>
        <input class="un " type="text" align="center" placeholder="Nombre completo" name="nombre" id="nombre" value="<?php echo $nombre;?>"  readonly>
        <input class="un " type="text" align="center" placeholder="Teléfono" name="tel" id="tel" value="<?php echo $tel;?>" required>
        <input class="un " type="email" align="center" placeholder="Correo Electrónico" name="email" id="email" value="<?php echo $mail;?>" required>
        <input class="un " type="text" align="center" placeholder="Dirección" name="direccion" id="direccion"value="<?php echo $direc;?>" required>
        
        <button class="submit" type="button" onclick="ActualizarPerfil()"  align="center">Modificar</button>
            
        </form> 
      <br>
		</div>
	</div>
</div>
  </section>

  <script>

  $(function() {// cualquier cosa que se escriba dentro de esta función, se va a ejecutar apenas cargue la página
    GraficosEncargadoControlInterno();
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

function ActualizarPerfil(){
            
  if (!$('#perfil')[0].checkValidity()){
      $('#perfil')[0].reportValidity();
    }else{
    var datos=$('#perfil').serialize();
      $.ajax({
        url: 'PerfilMetodo.php?tipo=update', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
          
            mensaje("La información de perfil ha sido actualizada.","success");
            setTimeout(function(){window.location.href = "Perfil.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
         
        }
      });

    }
    }

    function EliminarPerfil(ident){
              
                $.ajax({
                  url: 'PerfilMetodo.php?tipo=eliminar', 
                  type: 'POST',
                  data:{id:ident}, // solo le mandamos el id, porque no hay formulario
                  success:function(response)
                  {
                      mensaje("Su perfil ha sido eliminado correctamente.","success");
                      setTimeout(function(){window.location.href = "Principal.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                   
          
                  }
                });
          
              
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
</script>     
</body>
</html>

