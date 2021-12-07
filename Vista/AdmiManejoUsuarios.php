<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  header('Location: Principal.php');
}else{
$id=$_SESSION['id'];
$rol= $_SESSION['Rol'];
$depa= $_SESSION['departamento'];

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
          <img src="img/profile.png" width="100px" height="100px;">
          <h2>Manejo de Usuarios</h2>
          <br>
          <select class="un " name="depa" id="depa" onchange="InfoUsuarios()"required >
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
          <th>Identificación</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th>Dirección</th>
          <th>Rol</th>
          <th></th>
          <th></th>
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
      <form class="form1" name="perfil" id="perfil">
        <input class="un " type="text" align="center" placeholder="Identificación" name="id" id="id" value="" readonly>
        <input class="un " type="text" align="center" placeholder="Nombre completo" name="nombre" id="nombre" value=""  readonly>
        <input class="un " type="text" align="center" placeholder="Teléfono" name="tel" id="tel" value="" required>
        <input class="un " type="email" align="center" placeholder="Correo Electrónico" name="email" id="email" value="" required>
        <input class="un " type="text" align="center" placeholder="Dirección" name="direccion" id="direccion"value="" required>
        <input class="un " type="text" align="center" placeholder="Rol" name="rol" id="rol"value="" required>
      
      
        </form> 
        <center>
        <button class="submit" type="button" style="width:30%" onclick="ActualizaUsuario()"  align="center">Modificar Usuario</button>
        <br>
        <br>
        <button class="submit" type="button"  style="width:30%" onclick="EliminaUsuario()"  align="center">Eliminar Usuario</button>
                      </center>
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
      var col6 = currentRow.find("td:eq(5)").html();

      $("#id").val(col1);
      $("#nombre").val(col2);
      $("#tel").val(col3);
      $("#email").val(col4);
      $("#direccion").val(col5);
      $("#rol").val(col6);
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

function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    } 


function InfoUsuarios(){
            
            var op=$("#depa").val();
          $.ajax({
            url: 'AdmiManejoUsuariosMetodo.php?tipo=Info', 
            type: 'POST',
            data:{Opcion:op} , 
            success:function(response)
            { 
              $("#tabla > tbody").html("");
              $("#tabla").append(response);
            }
          });
        }

        function EliminaUsuario(){
            
            var op=$("#id").val();
          $.ajax({
            url: 'AdmiManejoUsuariosMetodo.php?tipo=Elimina', 
            type: 'POST',
            data:{Opcion:op} , 
            success:function(response)
            { 
              mensaje("El perfil ha sido eliminado correctamente.","success");
              setTimeout(function(){window.location.href = "";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                   
          
            }
          });
        }

        
function ActualizaUsuario(){
            
            if (!$('#perfil')[0].checkValidity()){
                $('#perfil')[0].reportValidity();
              }else{
              var datos=$('#perfil').serialize();
                $.ajax({
                  url: 'AdmiManejoUsuariosMetodo.php?tipo=Actualiza', 
                  type: 'POST',
                  data:datos , // The form with the file inputs.
                  success:function(response)
                  {
                      mensaje("La información de usuario ha sido actualizada.","success");
                      setTimeout(function(){window.location.href = "";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                  }
                });
          
              }
              }




   
</script>     
</body>
</html>

