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
$info=$objsm->InfoPeriodo();
$est="";
$ini="";
$fin="";
 while ($row = mysqli_fetch_array($info)){
  $ini=$row ['FechaInicio'];
  $fin=$row ['FechaFinal'];
  $est=$row ['Estado'];
  }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/styleGeneral.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css"> 
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
<br>
    <br>
    <p class="sign" align="center"><div style="text-align: center;" class="hover15"><figure>  <img src="img/settings.png" alt="logo" -o-object-fit: cover width="100px" height="100px"></figure></div></p>
  <br>
    <h3 class="sign" align="center">Configuracion de Periodo del Formulario</h3>
    <form class="form1"name="periodo" id="periodo">
        <br>
        <h5>Estado de Formulario</h5>
        <input class="un " type="text" align="center" style="width:45%" value="<?php echo $est ?>" name="estado" id="estado">
        <br>
    <h5 class="sign" align="center">Fecha de Inicio Período</h5>

 
        <input class="un " type="date" align="center" style="width:45%" placeholder="Fecha de Inicio" value="<?php echo $ini ?>" name="inicio" id="inicio" required>
        <h5 class="sign" align="center">Fecha Final Período</h5>


        <input class="un " type="date" align="center" style="width:45%" placeholder="Fecha Final" value="<?php echo $fin ?>" name="fin" id="fin" required>
        <br>
        
      
        <button class="submit"  style="width:25%" type="button" onclick="ActualizarPeriodo()"  align="center">Asignar Periodo</button>
        <br>
        <br>

       <button class="submit"  style="width:25%" type="button" onclick="NotificarUsuarios()"  align="center">Notificar Usuarios</button>
       </form> 

       <br>
      <br>
          
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
    function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: false,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }

    function ActualizarPeriodo(){
            
            if (!$('#periodo')[0].checkValidity()){
                $('#periodo')[0].reportValidity();
              }else{
              var datos=$('#periodo').serialize();
                $.ajax({
                  url: 'AdmiConfiguracionPeriodoMetodo.php?tipo=Actualizar', 
                  type: 'POST',
                  data:datos , // The form with the file inputs.
                  success:function(response)
                  {
                    if(response!=0){
                      mensaje("El periodo del formulario ha sido actualizado.","success");
                     setTimeout(function(){window.location.href = "AdmiConfiguracionPeriodo.php";}, 2000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
                  }else{
                    mensaje("Error al actualizar el período del formulario.","danger");
                    setTimeout(function(){window.location.href = "AdmiConfiguracionPeriodo.php";}, 2000);
                  }
                  }
                });
          
              }
    }

    function NotificarUsuarios(){
              
              $.ajax({
                url: 'AdmiConfiguracionPeriodoMetodo.php?tipo=Notificar', 
                type: 'POST',
                data:{}, // solo le mandamos el id, porque no hay formulario
                success:function(response)
                {
                    mensaje("Los usuarios han sido notificados del inicio de un período de evaluación.","success");
        
                }
              });
        
            
            }
</script>   

</div>
    
  
  </section>
  </body>
   

</html>