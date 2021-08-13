<?php

// recibimos datos del usuario con sus verificaciones

require_once '../../data/bootstrap.php';
require_once '../../libraries/auth.php';
require_once '../../libraries/usuarios.php';

// form
$email = trim($_POST['email']);
$password = trim($_POST['password']);

//  validacion 
$errores = [];

if(empty($email)) {
    $errores['email'] = "Debes escribir tu email";
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] =  "El email no tiene un formato valido - tienda@tienda.com.ar";
}

if(!empty($errores)) {
    $_SESSION['old_data'] = $_POST;
    $_SESSION['errores'] = $errores;
    header('Location: ../index.php?s=login');
    exit;
}

// verificamos usuario con la funcion authLogin

if(authLogin($db, $email, $password)){
    $seccion = $_SESSION['seccion_preten'] ?? 'home';
    unset($_SESSION['seccion_preten']);
    header('Location: ../index.php?s=' . $seccion);
    exit;
} else {
    $_SESSION['old_data'] = $_POST;
    $_SESSION['success_errors'] = "Los datos de ususario ingresado no coinciden";
    header('Location: ../index.php?s=login');
    exit;
}