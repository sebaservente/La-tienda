<?php

require  '../data/bootstrap.php';
require_once '../libraries/usuarios.php';
require_once '../libraries/auth.php';

$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

// todo validar
if(empty($email)){
    $errores['email'] = "Te estas olvidando el email";
}

if(empty($password)){
    $errores['password'] = "Te olvidaste el Password";
} else if(strlen($password) < 6){
    $errores['password'] = "Minimo 6 caracteres";
}

if(!empty($errores)){
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=registro');
    //importante
    exit;
}


$idRol = 2;
$idUsuario = usuariosCrear($db, [
    /*'idRol'     => $idRol,*/
    'email'     => $email,
    'password'  => $password,
    'nombre'    => $nombre,
    'apellido'  => $apellido,

]);

if ($idUsuario !== false){
    /*authLogin($db, $email, $password);*/

    /*echo"<pre>";
    print_r($_SESSION);
    echo"</pre>";
    exit;*/

    authSetLogin([
        'id_usuario' => $idUsuario,
        'id_rol'     => 2,
        'email'      => $email,
        /*'password'  => $password,*/
        'nombre'     => $nombre,
        'apellido'   => $apellido,
    ]);

    $_SESSION['success'] = "¡Regitro exitoso, gracias por unirte a nosotros, " . $email . "!";
    header('Location: ../index.php?s=productos');
    exit;
}else{
    $_SESSION['success_errors'] = 'Ocurrio un error al guardar el registro en nuestro servidor. Por favor prueba mas tarde. Si el problema persiste comunicate con nosotros';
    header('Location: ../index.php?s=registro');
    exit;
}


