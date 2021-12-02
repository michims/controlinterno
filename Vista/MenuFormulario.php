<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  //header('Location: Principal.php');
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

require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$estado=$objsm->ActualizarEstadoFormulario();
$habilitar="";
if ($estado=='Inactivo'){
$habilitar="pointer-events:none";
}
if($estado=='Activo'){
  $habilitar="pointer-events:auto";
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
      
          <br>
          <h2>Formulario Autoevaluación</h2>
          <h3>Modelo de Madurez</h3>
          <br>
          <h2>Componentes de Formulario</h2>
        <br>  
        <div class="grid-wrapper">
        <input class="un " type="hidden" align="center" value="<?php echo $estado ?>" name="estado" id="estado">
<div class="contenedor" style="<?php echo $habilitar ?>" onclick="ComponenteForm('1')">  
         <figure>
             <img src="./img/Ambiente.jpg">
             <div class="capa">
                 <h3>Ambiente</h3>
                 <p>El ambiente de control es el conjunto de factores del ambiente organizacional que deben establecer y mantener el jerarca, los titulares subordinados y demás funcionarios, para permitir el desarrollo de una actitud positiva y de apoyo para el control interno. </p>
             </div>
         </figure>
 </div>

 <div class="contenedor" style="<?php echo $habilitar ?>" onclick="ComponenteForm('2')">
    <a href="#">
         <figure>
             <img src="./img/Riesgo.jpg">
             <div class="capa">
                 <h3>Riesgo</h3>
                 <p>La valoración del riesgo conlleva la identificación y el análisis de los riesgos que enfrenta la institución, tanto de fuentes internas como externas relevantes para la consecución de los objetivos; deben ser realizados por el jerarca y los titulares subordinados, con el fin de determinar cómo se deben administrar dichos riesgos.</p>
             </div>
         </figure>
     </a>
 </div>

 <div class="contenedor"  style="<?php echo $habilitar ?>" onclick="ComponenteForm('3')">
    <a href="#">
         <figure>
             <img src="./img/Actividades.jpg">
             <div class="capa">
                 <h3>Actividades</h3>
                 <p>La Ley General de Control Interno define las actividades de control como políticas y procedimientos que permiten obtener la seguridad de que se llevan a cabo las disposiciones emitidas por la Contraloría General de la República, por los jerarcas y titulares subordinados para la consecución de los objetivos del sistema de control interno.</p>
             </div>
         </figure>
     </a>
 </div>

 <div class="contenedor" style="<?php echo $habilitar ?>" onclick="ComponenteForm('4')">
    <a href="#">
         <figure>
             <img src="./img/Sistemas.jpeg">
             <div class="capa">
                 <h3>Sistemas</h3>
                 <p>Los sistemas de información son los elementos y condiciones necesarias para que de manera organizada, uniforme, consistente y oportuna se ejecuten las actividades de obtener, procesar, generar y comunicar la información de la gestión institucional y otra de interés para la consecución de los objetivos institucionales.</p>
             </div>
         </figure>
     </a>
 </div>


 <div class="contenedor" style="<?php echo $habilitar ?>" onclick="ComponenteForm('5')">
    <a href="#">
         <figure>
             <img src="./img/Seguimiento.jpg">
             <div class="capa">
                 <h3>Seguimiento</h3>
                 <p>El seguimiento comprende las actividades que se realizan para valorar la calidad del funcionamiento del sistema de control interno, a lo largo del tiempo; asimismo, para asegurar que los hallazgos de la auditoría y los resultados de otras revisiones se atiendan con prontitud.</p>
             </div>
         </figure>
     </a>
 </div>
 

</div>

</div>
    
  
  </section>
  </body>
  <script>
      $(function() {// cualquier cosa que se escriba dentro de esta función, se va a ejecutar apenas cargue la página
   valestado();
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
function ComponenteForm(numComponente){
window.location.href="FormularioComponentes.php?comp="+numComponente;
}
    function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }

function valestado(){
var estado=$("#estado").val();

if(estado=='Inactivo'){
  mensaje("No se encuentra disponible el formulario de evaluación.","danger")
}

}
</script>     

</html>

