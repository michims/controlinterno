<?php
 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
$_SESSION['id']='';
?>
<html>

<head >
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/styleInicio.css">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Review.me</title>
</head>

<body >
    <nav class="zone blue sticky">
        <ul class="main-nav">
           
           
            <li class="push" ><a href="InicioSesion.php">Iniciar Sesión</a></li>
            
    </ul>
    </nav>
    <div class="container" >
    
    <img class="cover" src="img/cover3-2.jpg">
        <div class="coverText"><img src="img/logo3.png" width="50%" height="30%" >
        <h1>La herramienta más potente para evaluar el grado de madurez en las distintas áreas de su empresa.</h1>
        </div>
    </div>
    
    <footer class="zone"><p>2021 Review.me</p></footer>
  </div>
  </body>

</html>