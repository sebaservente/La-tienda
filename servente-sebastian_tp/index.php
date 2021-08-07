<?php

require 'data/bootstrap.php';

require 'data/routes.php';

$seccion = $_GET['s'] ?? "home";
if(!isset($secciones[$seccion])) {
    $seccion = 404;
}
/*$usuarios = usuarioTraerPorId($db, $_GET['id']);*/

if($enviromentState === ENVIROMENT_MANTAINANCE) {
    $seccion = "mantenimiento";
}

$title = $secciones[$seccion]['title'];

$success = sessionValueGetFlash('success');
$successErrors = sessionValueGetFlash('success_errors');
$successInfo = sessionValueGetFlash('successInfo');

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lakki+Reddy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos_nuevo.css">
    <!--<link rel="stylesheet" href="css/estilos.css">-->
</head>
<body>
    <header class="header-home container-fluid " id="header">
        <h1>La Tienda</h1>
        <div class="row">
            <nav class="nav-index col navbar navbar-expand-md navbar-dark ">
                <a class="navbar-brand w-25 m-0" href="#">
                    <img src="imgs/logo-01.png" alt="logo de la marca by Vizzentino" class="logo-home">
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
                            <a class="nav-link text-warning" href="index.php?s=home" title="Home"><i class="bi bi-house-door"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="index.php?s=productos" title="Productos"><i class="bi bi-shop"></i></a>
                        </li>
                    <?php
                    if(!authEstaAutenticado()):?>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="index.php?s=login">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="index.php?s=registro">Registrarse</a>
                        </li>
                        <?php
                        else: ?>
                        <?php
                        if(authEstaAutenticado() && authEsAdmin()):
                            ?>
                        <li class="nav-item">
                            <a class="nav-link text-warning " href="admin/index.php?s=productos" title="Panel del administrador"><i class="bi bi-building"></i></a>
                        </li>
                        <?php
                        endif;
                        ?>
                        <li class="nav-item">
                            <a class="nav-link text-warning" title="Perfil del usuario" href="index.php?s=perfil&id=<?= authObtenerUsuario()['id_usuario'];?>""><i class="bi bi-person"></i></a>
                        </li>
                        <li class="nav-item" id="cerrarSesion">
                            <a class="nav-link text-warning" href="index.php?s=carrito" title="Carrito de compras"><i class="bi bi-cart4"></i></a>
                        </li>
                        <li class="nav-item" id="cerrarSesion">
                            <a class="nav-link" title="Cerrar sesion" href="acciones/logout.php"><!--@--><?/*= authObtenerUsuario()['apodo'];*/?> <i class="bi bi-x-octagon"></i></a>
                        </li>

                        <?php
                        endif;
                        ?>

                    </ul>
                    <div class="divImagen d-none d-md-block d-sm-none ">
                        <figure>
                            <img src="imgs/<?= authObtenerUsuario()['img'];?>" class="img-fluid figure-img d-flex justify-content-center" alt="<?= htmlspecialchars(authObtenerUsuario()['alt_img']);?>">
                        </figure>
                    </div>
                </div>
            </nav>

        </div>
    </header>
    <main>
        <!-- todo: ajustar el css -->
        <?php
        if($success !== null): ?>
            <div class="msj-success mt-3 pl-4"><?= $success;?></div>
        <?php
        endif; ?>

        <?php
        if($successErrors !== null): ?>
            <div id="err" class="msj-error pl-4 bg-warning"><?= $successErrors;?></div>
        <?php
        endif; ?>
        <?php

        if($successInfo !== null): ?>
            <div class="msj-info pl-4"><?= $successInfo;?></div>
        <?php
        endif; ?>

        <?php
        require 'secciones/' .  $seccion . '.php';
        ?>

    </main>
    <footer>
        <div class="contenedores">
            <div class="divInstitucion">
                <p class="institucion">Escuela Davinci</p>
                <ul>
                    <li>Carrera: Diseño y Desarrollo Web.</li>
                    <li>Docente: Gallino, Santiago.</li>
                    <li>Alumno: Servente, Sebastian andres.</li>
                </ul>
            </div>

            <div class="ambos">
                <div class="divNavegacion">
                    <p class="parrafoNavegacion">Sobre Nosotros</p>
                    <ul>
                        <li>Desarrollo</li>
                        <li>Diseño</li>
                        <li>Tecnologias</li>
                        <li>Equipo</li>
                    </ul>
                </div>
                <div class="divContacto">
                    <p class="">Redes Sociales</p>
                    <ul>
                        <li><i class="bi bi-linkedin"></i>Inkedin</li>
                        <li><i class="bi bi-github"></i>Github</li>
                        <li><i class="bi bi-facebook"></i>Facebook</li>
                        <li><i class="bi bi-instagram"></i>Instagram</li>
                    </ul>
                </div>
            </div>
            <div class="contenedor">
                <div class="divUbicacion">
                    <p><i class="bi bi-geo-alt-fill"></i></p>
                    <p class="text-light">Argentina, Ciudad de Buenos Aires</p>
                </div>
                <div class="divUbicacion">
                    <p><i class="bi bi-envelope"></i></p>
                    <p class="text-light">sebastian.servente@davinci.edu.ar</p>
                </div>
                <div class="divUbicacion">
                    <p><i class="bi bi-whatsapp"></i></p>
                    <p class="text-light">(011)6811-5765</p>
                </div>
            </div>
        </div>
    </footer>
    <?php
    if(isset($secciones[$seccion]['js'])):
        foreach ($secciones[$seccion]['js'] as $script): ?>
        <script src="<?=$script;?>"></script>
    <?php
        endforeach;
    endif; ?>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script>
        $('.nav-item').on('click', function(){
            $(".navbar-collapse").collapse("hide");
        })
    </script>
</body>
</html>