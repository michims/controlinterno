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
$departamento=$objsm->ComboRegistroUsuario();

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
          <img src="img/logoresultado.png" width="100px" height="100px;">
          <h2>Revisión de Respuestas Formulario</h2>
          <br>
          <select class="un " name="depa" id="depa" required onchange="InfoResultados()">
        <option value="" disabled selected>Departamento de trabajo</option>
        <?php while ($row = mysqli_fetch_array($departamento)){
                        echo "<option value=". $row ['IdDepartamento'].">" . $row['NombreDepartamento'] . "</option>";
                        }
                        ?>
        </select>
        <br>
      <table name="tabla" id="tabla">
      <thead>
        <tr>
          <th style='display:none;'>IdResultado</th>   
          <th>Componente</th>
          <th>Caracteristica</th>
          <th>Opcion</th>
          <th>Fecha Registro</th>
          <th>Estado</th>
        </tr>
      </thead><thead>
      </thead><tbody>
      </tbody>
    </table>
       
      </div>
      
    </div>
    <div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Modificar Información</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="form" id="form">
        <input class="un " type="hidden" align="center" placeholder="IdResultado" name="id" id="id" value="" readonly>
        <input class="un " type="text" align="center" placeholder="Evidencia" name="evi" id="evi" value=""  required>
        <input class="un " type="text" align="center" placeholder="DocFaltante" name="doc" id="doc" value="" >
        <input class="un " type="text" align="center" placeholder="Problemas" name="prob" id="prob" value="" >
        <input class="un " type="text" align="center" placeholder="Compromisos" name="compro" id="compro" value="">
            
        </form> 
      <br>
		</div>
	</div>
</div>
  </section>

  <script>

$(document).ready(function(){
     $("#tabla").on('click', '.btnSelect', function() {
      // get the current row
      var currentRow = $(this).closest("tr");

      var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
      var col2 = currentRow.find("td:eq(5)").html(); // get current row 2nd table cell TD value
      var col3 = currentRow.find("td:eq(6)").html(); // get current row 3rd table cell  TD value
      var col4 = currentRow.find("td:eq(7)").html();
      var col5 = currentRow.find("td:eq(8)").html();

      $("#id").val(col1);
      $("#evi").val(col2);
      $("#doc").val(col3);
      $("#prob").val(col4);
      $("#compro").val(col5);
      
    });

 });

   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

function InfoResultados(){
            
            var op=$("#depa").val();
          $.ajax({
            url: 'EncargadoRevisionRespuestaFormularioMetodo.php?tipo=Resultados', 
            type: 'POST',
            data:{Opcion:op} , 
            success:function(response)
            { if(response!=""){
              $("#tabla > tbody").html("");
              $("#tabla").append(response);
              mensaje("Se han cargado los resultados del departamento para el período de evaluación","success")
            }

              else{
              mensaje("No existen resultados para el departamento","info")

            }
            }

          });
        }
  
        function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });
    } 

    function Comentar(){
            
            if (!$('#form')[0].checkValidity()){
              $('#form')[0].reportValidity();
                }else{
                  var datos=$('#form').serialize();
                    $.ajax({
                    url: 'EncargadoRevisionRespuestaFormularioMetodo.php?tipo=Comentar', 
                      type: 'POST',
                    data:datos , // The form with the file inputs.
                    success:function(response)
                      {
                        mensaje("Se han añadido los comentarios","success");
                        setTimeout(function(){window.location.href = "EncargadoRevisionRespuestasFormulario.php";}, 2000);
                      }
                          });
                    
                        }
                        }
</script>     
</body>
</html>

