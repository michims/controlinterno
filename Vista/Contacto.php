
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
  <title>Review.me</title>
</head>

<body>
  <div class="mainayuda">
  <a href="Principal.php">
    <p class="sign" align="center"><div style="text-align: center;" class="hover15"><figure>  <img src="img/logo.png" alt="logo" -o-object-fit: cover width="130px" height="91px"></figure></div></p>
</a>  
    <p class="sign" align="center">Formulario de contacto</p>
    <form class="form1" name="contacto" id="contacto">
      <input class="un " type="text" align="center" placeholder="Nombre Completo" required name="nombre" id="nombre">
      <input class="un " type="email" align="center" placeholder="Correo Electrónico"required name="email" id="email">
      <textarea class="textsugerencia " align="center"  placeholder="Consulta" required name="consulta" id="consulta"></textarea>
      
      <button class="submit" type="button" onclick="Contacto()"  align="center">Enviar</button>
      <p class="forgot" align="center"><a href="Principal.php">Regresar</p>    
    </form>           
    </div>
    <script>
          function Contacto(){
            
            if (!$('#contacto')[0].checkValidity()){
            $('#contacto')[0].reportValidity();
         }else{
           var datos=$('#contacto').serialize();
      $.ajax({
        url: 'ContactoMetodo.php', 
        type: 'POST',
        data:datos , // The form with the file inputs.
        success:function(response)
        {
          if(response!=""){
            mensaje("Se ha registrado su consulta, le responderemos a su correo electrónico a la menor brevedad.","success");
            setTimeout(function(){window.location.href = "Principal.php";}, 2000);//Redirecciona luego de 3 Segundos para poder visualizar el mensaje
          }else{
            mensaje("Error al realizar Registro","danger");
          }

        }
      });

    }
    }
    function mensaje(msj,tipo){//tipos= success,info,danger,warning
      $.jnoty(msj, {
            sticky: true,
            header: 'Review.me',
            theme: 'jnoty-'+tipo,
            icon: 'fa fa-check-circle fa-2x'
          });

    }
</script>     
</body>

</html>

