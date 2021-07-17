<?php

/*echo "hola mundo";*/
require_once '../data/bootstrap.php';
require_once '../data/conexion.php';
require_once '../libraries/usuarios.php';

// capturamos el email
$email = $_POST['email'];

// buscamos al usuario por email
$usuario = usuarioBuscaPorEmail($db, $email);

if (!$usuario){
    $_SESSION['success_errors'] = 'El email ingresado no coincide con ningun email registrado. Por favor revisa que este correcto el email';
    header('Location: ../index.php?s=recuperar-password');
    exit;
}

$token = usuarioGenerarTokenRecu($db, $usuario['id_usuario']);

//leo el template del email recuperar password
$cuerpo = file_get_contents(__DIR__ . '/../email/recuperar-password.html');

$link = "http://127.0.0.1/La-tienda/servente-sebastian_tp/index.php?s=nuevo-password&token=" . $token . "&email=" .$email;

$cuerpo = str_replace('@@EMAIL@@', $email, $cuerpo);
$cuerpo = str_replace('@@URL@@', $link, $cuerpo);

// $destinatario = $email;
$asunto = "La Tienda :: Restablecer Contraseña";
$headers = "";