<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
?>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/styleLogin.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <script type="text/javascript" src="plugins/jnoty.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/jnoty.min.css">


  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Review.me</title>
</head>

<body>
  <div class="main">
  <a href="Principal.php">
    <p class="sign" align="center"><div style="text-align: center;" class="hover15"><figure>  <img src="img/logo.png" alt="logo" -o-object-fit: cover width="130px" height="91px"></figure></div></p>
  </a>
    <p class="sign" align="center">Iniciar Sesión</p>
    <form class="form1" name="login" id="login">
      <input class="un " type="text" align="center" placeholder="Usuario" name="identificacion" id="identificacion" required>
      <input class="pass " type="password" align="center" placeholder="Clave" name="clave" id="clave" required>
      <button class="submit" type="button" onclick="Login()"  align="center">Ingresar</button>
</form>
     
            
                
    </div>
<script>
          function Login(){
            
            if (!$('#login')[0].checkValidity()){
            $('#login')[0].reportValidity();
         }else{
           var datos=$('#login').serialize();
      $.ajax({
        url: 'InicioSesionMetodo.php', 
        type: 'POST',
        data:datos , 
        success:function(response)
        { 
          if((response.toString().length>0)){
            window.location.href = "Perfil.php";
          }else{
            mensaje("Error al iniciar sesión,verifique su usuario y clave.","danger");
           
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



