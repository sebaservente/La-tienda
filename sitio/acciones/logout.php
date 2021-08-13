<?php

require_once '../data/bootstrap.php';
/*require_once '../../libraries/auth.php';*/
//require_once '../../libraries/usuarios.php';

authLogout();

$_SESSION['success'] = "¡Cerraste sesion exitosamente!";
header('Location: ../index.php?s=home');
