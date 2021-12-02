<?php
require '../Modelo/ConsultasModel.php';
require_once '../Config.php';
$objconfig = new Config();
$objsm =  new ConsultasModel($objconfig);
$departamento=$objsm->ComboRegistroUsuario();

?>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/styleLogin.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Registro de Usuarios</title>
</head>

<body>
  <div class="mainregistro">
    <a href="Principal.php">
    <p class="sign" align="center"><div style="text-align: center;" class="hover15"><figure>  <img src="img/logo.png" alt="logo" -o-object-fit: cover width="130px" height="91px"></figure></div></p>
    </a>
    <p class="sign" align="center">Registro de Usuario</p>
    <form class="form1"name="registro" id="registro">
        <input class="un " type="text" align="center" placeholder="Identificación" name="id" id="id" required>
        <input class="un " type="text" align="center" placeholder="Nombre completo" name="nombre" id="nombre" required>
        <input class="un " type="text" align="center" placeholder="Teléfono" name="tel" id="tel" required>
        <input class="un " type="email" align="center" placeholder="Correo Electrónico" name="email" id="email" required>
        <input class="un " type="text" align="center" placeholder="Dirección" name="direccion" id="direccion"required>
        <select class="un " name="depa" id="depa" required >
        <option value="" disabled selected>Departamento de trabajo</option>
        <?php while ($row = mysqli_fetch_array($departamento)){
                        echo "<option value=". $row ['IdDepartamento'].">" . $row['NombreDepartamento'] . "</option>";
                        }
                        ?>
        </select>
        <button class="submit" type="button" onclick="Registro()"  align="center">Registrarse</button>
        <p class="forgot" align="center"><a href="InicioSesion.php">Regresar</p> 
            
        </form>           
    </div>

    <script>
          function Registro(){
            
            if (!$('#registro')[0].checkValidity()){
            $('#registro')[0].reportValidity();
         }else{
           var datos=$('#registro').serialize();
      $.ajax({
        url: 'RegistroUsuarioMetodo.php', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
          if(response!=0){
            mensaje("Se ha enviado a su correo electrónico la información de inicio de sesión","success");
            setTimeout(function(){window.location.href = "Principal.php";}, 3000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
          }else{
           mensaje("Error de registro de usuario.","danger");//mandar el mensaje y el tipo
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

