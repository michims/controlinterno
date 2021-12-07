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


//$infotabla=$objsm->TablaResultadosForm($depa);
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
    
      <div class="contenidoresultado">
        <center>
          <br>
          <br>
          <br>
          <img src="img/logoresultado.png" width="100px" height="100px;">
          <h2>Resultados Evaluación</h2>
        <br>
        <br>
          <select class="un " name="depa" id="depa" required >
        <option value="" disabled selected>Departamento de trabajo</option>
        <?php while ($row = mysqli_fetch_array($departamento)){
                        echo "<option value=". $row ['IdDepartamento'].">" . $row['NombreDepartamento'] . "</option>";
                        }
                        ?>
        </select>
        </center>
        <br>
   
        <table>
       <thead>
        <tr>
          <th>Componente</th>
          <th>Característica </th>
          <th>Opción</th>
          <th>Evidencia Necesaria</th>
          <th>Evidencia Optativa</th>
          <th>Documentación Faltante</th>
          <th>Problemas Presentados</th>
          <th>Compromisos de Mejora</th>
          <th></th>
        </tr>
       </thead><thead>
       </thead><tbody>
        
       <?php 

       ?>

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
        <input class="un " type="text" align="center" placeholder="Modulo" name="modulo" id="mod" value="<?php echo $id;?>" readonly>
        <input class="un " type="text" align="center" placeholder="Caracteristica" name="caracteristica" id="id" value="<?php echo $id;?>" readonly>
        <input class="un " type="text" align="center" placeholder="Opción" name="nombre" id="ne" value="<?php echo $nombre;?>"  readonly>
        <input class="un " type="text" align="center" placeholder="Evidencia" name="tel" id="tel" value="<?php echo $tel;?>" required>
        <input class="un " type="text" align="center" placeholder="Documentación Faltante" name="email" id="email" value="<?php echo $mail;?>" required>
        <input class="un " type="text" align="center" placeholder="Problemas Presentados" name="direccion" id="direccion"value="<?php echo $direc;?>" required>
        <input class="un " type="text" align="center" placeholder="Listado de Mejoras" name="direccion" id="direccion"value="<?php echo $direc;?>" required>
       

        
        
            
        </form> 
      <br>
		</div>
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

