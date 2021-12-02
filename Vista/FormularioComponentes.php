
<?php
header("Content-Type: text/html;charset=utf8");
$componente=$_REQUEST['comp'];
$nomComponente="";
if ($componente==1){
  $nomComponente=" Ambiente";
}
if ($componente==2){
  $nomComponente=" Riesgo";
}
if ($componente==3){
  $nomComponente=" Actividades";
}
if ($componente==4){
  $nomComponente=" Sistemas";
}
if ($componente==5){
  $nomComponente=" Seguimiento";
}

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

 if($_SESSION['id']==''){
  header('Location: Principal.php');
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
$info=$objsm-> ComboAtributoFormulario($componente);
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
        <span class="dashboard">Componente<?php echo $nomComponente?></span>
      </div>
    </nav>

<div class="home-content">
    
  <div class="contenido" style="text-align:center;">
          <h2>Autoevaluación Modelo de Madurez de Control Interno</h2>
          
          <br>
          <form class="form1"name="formulario" id="formulario">
          <select class="uncombo " name="atributo" id="atributo" title="Seleccione el atributo a calificar" onchange="ComboOp()" required >
        <option value="" disabled selected>Seleccione un atributo</option>
        <?php while ($row = mysqli_fetch_array($info)){
                        echo "<option value=". $row ['IdCaracteristica'].">" . $row['NombreCaracteristica'] . "</option>";
                        }
                        ?>
        </select>

        <br>
          <select class="uncombo " name="opcion" id="opcion" title="Seleccione la opción que este más acorde a su departamento" required >
        <option value="" disabled selected>Seleccione una opción</option>


        </select>
        <p><a href="#popup1" class="submit" align="center" >Detalle Opciones</a></p>
        <br>
        <br>
        <input class="textsugerencia" align="center" name="idresultado" id="idresultado" type="hidden">
        <input class="textsugerencia" value= "<?php echo $depa ?>" align="center" name="depart" id="depart" type="hidden">
        <input class="textsugerencia" type="text" title="Aportar la documentación necesaria para respaldar su respuesta, expresada en la casilla elegida. Debe Aportar toda evidencia anterior a la opción." align="center" placeholder="Enlaces a Evidencias" name="evidencia" id="evidencia" required>
        <input class="textsugerencia " type="text" title="Enlistar evidencias con las que no cuenta,según lo solicitado explicitamente de su dependencia." align="center" placeholder="Documentación Faltante" name="faltante" id="faltante">
        <input class="textsugerencia " type="text" title="Explique la razón por la cuál no cuenta con la evidencia probatoria de la gestión de su oficina o cualquier otro problema presentado." align="center" placeholder="Problemas Presentados" name="problemas" id="problemas">
        <input class="textsugerencia " type="text" title="Indique los compromisos de mejora para el próximo período."align="center" placeholder="Compromisos de Mejora" name="mejora" id="mejora">
        <div>
        <p><a class="submit" type="button" onclick="RegistroRespuesta()" align="left" style="display:none" name ="btguardar" id="btguardar">Guardar Respuesta</a></p>

        <br>
        <p><a class="submit" type="button" onclick="ActualizarRespuesta()" align="left" style="display:none" name ="btactualizar" id="btactualizar">Actualizar Respuesta</a></p>
        
       
        </div>
    
        </form> 
        <br>  
  
</div>
<div id="popup1" class="overlay">
	<div class="popup">
		<center><h3>Información de Opciones Atributo</h3></center>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<br>

      <table name="detalle" id="detalle">
      <thead>
        <tr>
          <th>Nombre Opcion</th>
          <th>Descripción</th>
          <th>Evidencia</th>
          <th></th>
        </tr>
      </thead><thead>
      </thead><tbody>

      </tbody>
    </table>

		</div>
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

function ComboOp(){

        var op=$("#atributo").val();
      $.ajax({
        url: 'FormularioComponentesMetodo.php?tipo=comboop', 
        type: 'POST',
        data:{Opcion:op} , 
        success:function(response)
        { $("#opcion").empty();
          $("#opcion").append(response);
          InfoOp()
          mensaje("Verificando si existe información previa.","info");
          InfoForm()

        }
      });

    }

    function InfoOp(){
            
            var op=$("#atributo").val();
          $.ajax({
            url: 'FormularioComponentesMetodo.php?tipo=infoop', 
            type: 'POST',
            data:{infoOpcionatributo:op} , 
            success:function(response)
            { $("#detalle > tbody").html("");
              $("#detalle").append(response);
    
            }
          });
    
        }

    function RegistroRespuesta(){
            
            if (!$('#formulario')[0].checkValidity()){
            $('#formulario')[0].reportValidity();
         }else{
           var datos=$('#formulario').serialize();
      $.ajax({
        url: 'FormularioComponentesMetodo.php?tipo=registro', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
            mensaje("Se ha registrado la información.","success");
            setTimeout(function(){window.location.href = "";}, 2000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
        }
      });

    }
    }

    function InfoForm(){
            
            var op1=$("#atributo").val();
            var op2=$("#depart").val();
          $.ajax({
            url: 'FormularioComponentesMetodo.php?tipo=infoForm', 
            type: 'POST',
            data:{infoOpcionatributo:op1,infodepa:op2} , 
            success:function(response)
            { if(response!=""){
              mensaje("Se ha cargado información previa.","success");
              info= response.split(";");
              $("#idresultado").val(info[0]);
              $("#atributo").val(info[1]);
              $("#opcion").val(info[2]);
              $("#evidencia").val(info[3]);
              $("#faltante").val(info[4]);
              $("#problemas").val(info[5]);
              $("#mejora").val(info[6]);
              $("#btactualizar").show();
              $("#btguardar").hide();
          }else{
            $("#idresultado").val("");
              $("#opcion").val("");
              $("#evidencia").val("");
              $("#faltante").val("");
              $("#problemas").val("");
              $("#mejora").val("");
              $("#btguardar").show();
              $("#btactualizar").hide();
            mensaje("No existe información previa para esta característica.","info");
          }

            }
          });
        }

      function ActualizarRespuesta(){
            
            if (!$('#formulario')[0].checkValidity()){
            $('#formulario')[0].reportValidity();
         }else{
           var datos=$('#formulario').serialize();
      $.ajax({
        url: 'FormularioComponentesMetodo.php?tipo=actualizar', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {console.log(response);
            mensaje("Se ha actualizado la información.","success");
            setTimeout(function(){window.location.href = "";}, 1000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
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

</html>

