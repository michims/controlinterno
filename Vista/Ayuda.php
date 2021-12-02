<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();


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
        <span class="dashboard"></span>
      </div>
    </nav>

    <div class="home-content">
    
    <div class="contenido" style="text-align:center;">
          <h2>Llenado de formulario</h2>
          <br>
          <br>
  
          <p>Ingresar a la pantalla lateral de formulario</p>
          <br>
          <img src="img/opcionformulario.png" alt="logo" -o-object-fit: cover width="210px" height="70px">
          <br>
          <br>
          <p>En caso que el formulario este habilitado le permitira ingresar al formulario y se mostrará como en la pantalla acontinuación:</p>
          <br>
          <br>
          <img src="img/formulario2.png" alt="logo" -o-object-fit: cover width="1100px" height="600px">
          <br>
          <br>
          <br>
          <p>Descripcion detallada de la pantalla:</p>
          <br>
          <br>
          <br>
          <img src="img/descripcion.png" alt="logo" -o-object-fit: cover width="1100px" height="600px">
          <br>
          <br>
          <br>
          <p>En caso de seleccionar un atributo, la página web buscará datos ligados a departamento y se le mostrará un mensaje como el siguiente en caso de que existan registros:</p>
          <br>
          <br>
          <br>
          <img src="img/mensajeok.png" alt="logo" -o-object-fit: cover width="400px" height="220px">
          <br>
          <br>
          <br>
          <p>En caso contrario de no tener datos ligados a su departamento se le mostrará el siguiente mensaje: </p>
          <br>
          <br>
          <br>
          <img src="img/mensajenocarga.png" alt="logo" -o-object-fit: cover width="400px" height="220px">
          <br>
          <br>
          <br>
          <p>Si se selecciona el botón mostrar detalle opciones se despliga una pantalla emergente con la descripción de cada elemento a evaluar con su descripción y la evidencia a ser evaluada:</p>
          <br>
          <br>
          <br>
          <img src="img/opcionatributo.png" alt="logo" -o-object-fit: cover width="1100px" height="300px">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
  
  
    
              
          </form> 
          <br>  
    
    </div>
</div>
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
</script>
    </section>
    </body>   

</html>