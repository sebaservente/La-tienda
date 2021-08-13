<?php
require_once  '../data/bootstrap.php';
require_once  '../data/conexion.php';
require_once  '../libraries/usuarios.php';


$token = $_POST['token'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($password)){
    $errores['password'] = "Te olvidaste el Password";
} else if(strlen($password) < 6){
    $errores['password'] = "Minimo 6 caracteres";
}

if(!empty($errores)){
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=nuevo-password');
    //importante
    exit;
}



$usuario = usuarioTokenRecuperarValido($db, $token, $email);
if(!$usuario){
    $_SESSION['success_errors'] = "El pedido no parece ser valido, proba de nuevo. Si el problema persiste, repeti el proceso una vez mas. Perdon por las molestias";
    header("Location: ../index.php?s=nuevo-password&token=" . $token . "&email=" .$email);
    exit;
}
$exito = usuarioActualizarPassword($db, $usuario ['id_usuario'], $password);

if($exito){
    usuarioTokenEliminar($db, $token);

    $_SESSION['success'] = "¡La contraseña fue actualizada correctamente! Proba de iniciar sesión ahora:)";
    header("Location: ../index.php?s=login");
} else {
    $_SESSION['success_errors'] = "Ocurrio un error al actualizar la contraseña. proba de nuevo. Si el problema persiste, comunicate con nosotros :(";
    header("Location: ../index.php?s=nuevo-password&token=" . $token . "&email=" .$email);
    exit;
}
