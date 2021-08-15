<?php

require_once '../../data/bootstrap.php';
require_once '../../libraries/auth.php';
//require_once '../../libraries/usuarios.php';

// tiene que estar autenticado para crear un producto
if(!authEstaAutenticado() || !authEsAdmin()) {
    /*    $_SESSION['seccion_preten'] = $seccion;*/
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}

authLogout();
$_SESSION['success'] = "¡ Cerraste sesión exitosamente !";
header('Location: ../../index.php?s=home');

