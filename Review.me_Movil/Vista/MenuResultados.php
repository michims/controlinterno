<?php

 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  //header('Location: Principal.php');
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
    
  <div class="contenido" style="text-align:center;">

      
  <br>
          <h1>Formulario Autoevaluación</h1>
          <h2>Modelo de Madurez</h2>
          <br>
        <br>
        <a href="ResultadosEvaluacion.php">

        <button class="submit" type="button" onclick="Tarjetaresult()"  align="center" style="font-size:30px">Resultados Evaluación</button></a>
        <br>
        <br>
        <a href="ResumenEstadisticasEncargadoDep.php">
        <button class="submit" type="button" onclick="Tarjetaestad()"  align="center" style="font-size:30px">Resumen de Información</button></a>
        </div>
        </div>
    
  
  </section>
  </body>
   
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
function Tarjetaresult(){
window.location.href="ResultadosEvaluacion.php";
}
function Tarjetaestad(){
window.location.href="ResumenEstadisticasEncargadoDep.php";
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

