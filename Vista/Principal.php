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
            <li>
                <a href="#">
                  <i class='bx bx-phone' ></i>
                  <span class="links_name"><a href="Contacto.php">Contacto</span>
                </a>
              </li>
           
            <li class="push" ><a href="InicioSesion.php">Iniciar Sesión</a></li>
            
    </ul>
    </nav>
    <div class="container" >
    <div class="slide">
			<div class="slide-inner">
				<input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden="" checked="checked">
				<div class="slide-item">
					<img src="img/cover.jpg">
				</div>
				<input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
				<div class="slide-item">
                    <img src="img/cover6.jpg">
				</div>
				<input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
				<div class="slide-item">
                    <img src="img/cover3.jpg">
				</div>

                
				<label for="slide-3" class="slide-control prev control-1">‹</label>
				<label for="slide-2" class="slide-control next control-1">›</label>
				<label for="slide-1" class="slide-control prev control-2">‹</label>
				<label for="slide-3" class="slide-control next control-2">›</label>
				<label for="slide-2" class="slide-control prev control-3">‹</label>
				<label for="slide-1" class="slide-control next control-3">›</label>
				<ol class="slide-indicador">
					<li>
						<label for="slide-1" class="slide-circulo">•</label>
					</li>
					<li>
						<label for="slide-2" class="slide-circulo">•</label>
					</li>
					<li>
						<label for="slide-3" class="slide-circulo">•</label>
					</li>
                    
				</ol>
			</div>
		</div>
   
   
    
  </div>
     
        <div class="coverText"><img src="img/logo3.png" width="50%" height="30%" >
        <h1>La herramienta más potente para evaluar el grado de madurez en las distintas áreas de su empresa.</h1>
        </div>
    </div>
    <div class="zone blue grid-wrapper">
        <div class="card zone">
            <img src="./img/teamplay.jpg">
            <div class="text">
                <h1>Institucional</h1>
                <p>Desde el departamento más pequeño hasta las gerencia, la herramienta permite evaluar el desempeño de su empresa.</p>
              
            </div>
        </div>
      <div class="card zone"><img src="./img/strategy.jpg">
          <div class="text">
              <h1>Configurable</h1>
              <p>Administre las evaluaciones por periodo. Fije sus metas y evalue resultados.</p>
            
          </div>
      </div>
      <div class="card zone"><img src="./img/innovation.jpg">
          <div class="text">
              <h1>Resultados y Decisiones</h1>
              <p>Visualice la información de manera dinámica y fácil.
              </p>
              
          </div>
      </div>
    </div>
    <footer class="zone"><p>2021 Review.me</p></footer>
  </div>
  </body>

</html>