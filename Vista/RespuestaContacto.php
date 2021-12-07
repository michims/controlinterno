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
$infotabla=$objsm->RespuestasContacto();
$configcorreo=$objsm->ConfigCorreo();
$mensajes=$objsm->ConsultaCorreoMensajes();
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
          <img src="img/mail.png" width="100px" height="100px;">
          <h2>Respuestas a formulario contacto</h2>
          <br>
          <br>
      <table id="tabla" name="tabla">
      <thead>
        <tr>
          <th style="display:none;">ID</th>
          <th>Nombre</th>
          <th>Consulta Usuario</th>
          <th>Correo</th>
          <th></th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>


        <?php 
         while ($row = mysqli_fetch_array($infotabla)){
        echo "<tr><td style='display:none'>". $row ['IdFormContacto']."</td><td>". $row ['NombreCompleto']."</td><td>" . $row['Consulta'] . "</td><td>" . $row['Correo'] ."</td>".
        "<td></i></a>&nbsp;<a  href='#popup1' class='btnSelect'><i class='bx bx-mail-send bx-sm' ></i></a></td>";
          }
       ?>


          
        </tr>
      </tbody>
    </table>
       <hr>
       <br>
       <h2>Configuración Correos</h2>
          <br>
          <br>
          <?php 
          $email="";
          $host="";
          $pass="";
           while ($row = mysqli_fetch_array($configcorreo)){
            $email=$row["Email"];
            $host=$row["Host"];
            $pass=$row["Password"];
              }
          ?>
          <form class="form1" name="configcorreo" id="configcorreo">
          <p>Mail</p>
          <input class="un" id="configemail" name="configemail" type="text" required value="<?php echo $email ?>" />
          <p>Host</p>
          <input class="un" id="host" name="host" type="text" required  value="<?php echo $host ?>" />
          <p>Password</p>
          <input class="un" id="clave" name="clave" type="text" required  value="<?php echo $pass ?> "/>
          <button  style="width:50%" class="submit" type="button" onclick="ModificarCorreo()">Modificar Parámetros</button>
        </form>
        
          <div>
      <table id="tablaCorreo" name="tablaCorreo">
      <thead>
        <tr>
          <th style="display:none;">ID</th>
          <th>IdMensaje</th>
          <th>Asunto</th>
          <th><div style="width:20%">Mensaje</div></th>
         <th><th>
        </tr>
      </thead><thead>
      </thead><tbody>


        <?php 
          while ($row = mysqli_fetch_array($mensajes)){
          echo "<tr><td>".$row['idMensaje']."</td><td>".$row['asuntoMensaje']."</td><td style='width:50%;word-wrap:break-word'>".$row['detalleMensaje']."</td><td><a href='#popup2' class='btnSelect2'><i class='bx bx-edit-alt bx-sm'></i></a></td></tr>";
          }
       ?>


          
        </tr>
      </tbody>
    </table>
        </div>
      </div>
      
    </div>
<div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Responder Consulta</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="contacto" id="contacto">
          <input id="idForm" name="idForm" type="hidden"/>
          <input class="un" id="email" name="email" type="text" required readonly/>
          <input class="textsugerencia" placeholder="Escriba aquí la respuesta al usuario" type="text" id="respuesta" name="respuesta" required/>
        </form> 
        <center>
      <button class="submit" type="button" onclick="Responder()" style="width:40%" align="center" >Responder</button>
        </center>
		</div>
	</div>
</div>
<div id="popup2" class="overlay">
	<div class="popup">
		<center><h3>Configuración Mensajes</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>
      <br>
      <form class="form1" name="mensajes" id="mensajes">
          <input id="idMensaje" name="idMensaje" type="hidden"/>
          <input class="un" id="asunto" name="asunto"  type="text" required />
          <textarea class="textsugerencia"  placeholder="Mensaje" name="mensaje" id="mensaje" rows="10" cols="30" required></textarea>
        
        </form> 
        <center>
      <button class="submit" type="button" onclick="ModificarMensaje()" style="width:40%" align="center" >Modificar Mensaje</button>
        </center>
		</div>
	</div>
</div>
  </section>

  <script>

$(document).ready(function(){
     $("#tabla").on('click', '.btnSelect', function() {
      // get the current row
      var currentRow = $(this).closest("tr");
      var id = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
      var correo = currentRow.find("td:eq(3)").html();
    
      $("#idForm").val(id);
      $("#email").val(correo);
    });

    $("#tablaCorreo").on('click', '.btnSelect2', function() {
      // get the current row
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").html();
      var asunto =currentRow.find("td:eq(1)").html();  // get current row 1st table cell TD value
      var mensaje = currentRow.find("td:eq(2)").html();
    
      $("#idMensaje").val(id);
      $("#asunto").val(asunto);
      $("#mensaje").val(mensaje);
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
            sticky: true,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }
function Responder(){
var formulario=$("#idForm").val();
var correo=$("#correo").val();
if (!$('#contacto')[0].checkValidity()){
            $('#contacto')[0].reportValidity();
         }else{
           var datos=$('#contacto').serialize();
      $.ajax({
        url: 'RespuestaContactoMetodo.php?tipo=Respuesta', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
        
            mensaje("Se ha Respondido la consulta Exitosamente","success");
            setTimeout(function(){window.location.href = "RespuestaContacto.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
         

        }
      });

    }
}
function ModificarMensaje(){
if (!$('#mensajes')[0].checkValidity()){
            $('#mensajes')[0].reportValidity();
         }else{
           var datos=$('#mensajes').serialize();
      $.ajax({
        url: 'RespuestaContactoMetodo.php?tipo=ActualizarMensaje', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
        
            mensaje("Se ha Actualizado el mensaje exitosamente","success");
            setTimeout(function(){window.location.href = "RespuestaContacto.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
         

        }
      });

    }
}
function ModificarCorreo(){
if (!$('#configcorreo')[0].checkValidity()){
            $('#configcorreo')[0].reportValidity();
         }else{
           var datos=$('#configcorreo').serialize();
      $.ajax({
        url: 'RespuestaContactoMetodo.php?tipo=ActualizarCorreo', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
        
            mensaje("Se ha Actualizado la configuración Correctamente","success");
            setTimeout(function(){window.location.href = "RespuestaContacto.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
         

        }
      });

    }
}

</script>     
</body>
</html>

