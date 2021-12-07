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
$componentes=$objsm->EditarComponenteFormulario();

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
          <img src="img/settings.png" width="100px" height="100px;">
          <h2>Modificación de formulario</h2>
          <br>
          <br>

          <select class="un " name="comp" id="comp" onchange="ComboAtributo()" required >
        <option value="" disabled selected>Seleccione un Componente</option>
        <?php while ($row = mysqli_fetch_array($componentes)){
                        echo "<option value=". $row ['IdComponente'].">" . $row['NombreComponente'] . "</option>";
                        }
        ?>
        </select>
        <select class="un " name="atri"  id="atri"  onchange="InfoForm()" required >
        <option value="" disabled selected>Seleccione un atributo</option>
        </select>

    </center>
        <br>
      <table name="tabla" id="tabla">
      <thead>
        <tr>
          <th style="display:none;">IdOpcion</th>
          <th>Opción</th>
          <th>Valor</th>
          <th>Descripción</th>
          <th>Evidencia</th>
          <th></th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>
        <tr>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
       
      </div>
      
    </div>
    <div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Modificar Información de Opción</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="modifica" id="modifica">
        <input class="un " type="hidden" align="center" placeholder="IdOpcion" name="id" id="id" value="" readonly>
        <input class="un " type="text" align="center" placeholder="Opcion" name="nombre" id="nombre" value=""  readonly>
        <input class="un " type="text" align="center" placeholder="Valor" name="val" id="val" value="" required>
        <textarea class="textsugerencia" name="desc" id="desc" rows="10" cols="30" placeholder="Descripción" required></textarea>
        <textarea class="textsugerencia"  placeholder="Evidencia" name="evi" id="evi" rows="10" cols="30" required></textarea>
        
        <button class="submit" type="button" onclick="ActualizarForm()"  align="center">Modificar</button>
            
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
      var col2 = currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
      var col3 = currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
      var col4 = currentRow.find("td:eq(3)").html();
      var col5 = currentRow.find("td:eq(4)").html();

      $("#id").val(col1);
      $("#nombre").val(col2);
      $("#val").val(col3);
      $("#desc").text(col4);
      $("#evi").val(col5);
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

function ComboAtributo(){

var opcomponente=$("#comp").val();
$.ajax({
url: 'AdmiModificacionFormularioMetodo.php?tipo=comboatributo', 
type: 'POST',
data:{Opcion:opcomponente} , 
success:function(response)
{ 
  $("#atri").empty();
  $("#atri").append(response);
}
});

}
function InfoForm(){
            
            var op=$("#atri").val();
          $.ajax({
            url: 'AdmiModificacionFormularioMetodo.php?tipo=InfoTabla', 
            type: 'POST',
            data:{Opcion:op} , 
            success:function(response)
            { 
              $("#tabla > tbody").html("");
              $("#tabla").append(response);
            }
          });
        }

  function ActualizarForm(){
            
  if (!$('#modifica')[0].checkValidity()){
    $('#modifica')[0].reportValidity();
      }else{
        var datos=$('#modifica').serialize();
          $.ajax({
          url: 'AdmiModificacionFormularioMetodo.php?tipo=Modifica', 
            type: 'POST',
          data:datos , // The form with the file inputs.
          success:function(response)
            {
              if (response=='Inactivo'){
           mensaje("La información del formulario ha sido actualizada.","success");
           setTimeout(function(){window.location.href = "AdmiModificacionFormulario.php";}, 2000);
                  }else{
                    mensaje("El formulario se encuentra activo, no es editable.","warning");
                  }
                  }
                });
          
              }
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
</body>
</html>

