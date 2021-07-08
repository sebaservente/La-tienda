<?php

require 'data/bootstrap.php';

require 'data/routes.php';

$seccion = $_GET['s'] ?? "home";
if(!isset($secciones[$seccion])) {
    $seccion = 404;
}

if($enviromentState === ENVIROMENT_MANTAINANCE) {
    $seccion = "mantenimiento";
}

$title = $secciones[$seccion]['title'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>document.createElement("picture");</script>
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="imgs/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lakki+Reddy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="header-home container-fluid bg-dark ">
        <h1>Tienda de Cervezas</h1>
        <div class="row bg-dark">
            <nav class="nav-index col navbar navbar-expand-md navbar-dark ">               
                <a class="navbar-brand" href="#">
                    <img src="imgs/logo-01.png" alt="by Vizzentino" class="logo-home">
                </a>
                <button class="navbar-toggler " 
                        type="button" 
                        data-toggle="collapse" 
                        data-target="#barra" 
                        aria-controls="barra" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="barra">
                    <ul class="navbar-nav text-right ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header> 
    <main>
        
            <?php
                require 'secciones/' .  $seccion . '.php';
            ?>
        
    </main>
    <footer class="container-fluid page-footer font-small cyan darken-2 ">
		<div class="row  ">
			<div id="footer01" class="col-12 text-center m-auto" >
                <ul>
                    <li>Diseño y Desarrollo Web</li>									
                    <li>Comisión DwTn3A</li> 
                    <li>Profesor Santiago Gallino</li>
                </ul>
			</div>						
			<div id="footer" class="row  m-auto col-12 justify-content-center  "> 
                <a href="#"><img class="d-block w-100 img-fluid p-2" src="imgs/facebook.png" alt="redes sociales facebook"></a>
                <a href="#"><img class="d-block  w-100 img-fluid p-2" src="imgs/instagram.png"  alt="redes sociales instagram"></a>              
                <a href="#"><img class="d-block  w-100 img-fluid p-2" src="imgs/twitter.png"  alt="redes sociales twitter"></a>              
                <a href="#"><img class="d-block  w-100 img-fluid p-2" src="imgs/whatsapp.png"  alt="redes sociales twitter"></a>              
                <a href="#"><img class="d-block  w-100 img-fluid p-2" src="imgs/pinterest.png"  alt="redes sociales twitter"></a>								
			</div>
		</div>	
		<div class="bis row m-0">
			<div id="hovera" class="footer-copyright text-white text-center py-3 col-12 col-md-6 ">© 2020 Copyright/Todos los derechos Reservados:
				<a href="#" class="text-success"> sebaservente.com.ar</a>
			</div>
			 <div id="hoverb" class="footer-copyright  text-white  py-3 col-12  col-md-6">
				<a href="#"> <p class="card-text text-justify text-center text-white">Informacion Compañia | Privacion y Politica | Terminos y Condiciones.</p></a>
			</div>
		</div>
    </footer>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script>
        $('.nav-item').on('click', function(){
            $(".navbar-collapse").collapse("hide");
        })
    </script>
</body>
</html>