<?php


require  '../data/bootstrap.php';
/*require_once '../libraries/usuarios.php';
require_once '../libraries/auth.php';*/


$id = $_GET['id'];
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);

// todo validar
if(empty($email)){
    $errores['email'] = "Te estas olvidando el email";
}

if(empty($nombre)){
    $errores['apellido'] = "Te olvidaste el Apellido";
} else if(strlen($apellido) < 6){
    $errores['apellido'] = "Minimo 6 caracteres";
}

if(!empty($errores)){
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=editar-usuario&id=' . $id);
    //importante
    exit;
}
$exito = usuarioEditar($db, $id, $email, $password, $nombre, $apellido);

if($exito){

    $_SESSION['success'] = "El Usuario <b>" . $email . "</b> fue Editado con Exito";
    header('Location: ../index.php?s=perfil');
} else {
    //echo "No se Cargo el producto !!  Algo salio mal !!";
    $_SESSION['old_data'] = $_POST;
    $_SESSION['success_errors'] = "Algo malio sal en el servidor, al Editar el producto, Prueba mas tarde !! si no Comunicate con nosotros";
    header('Location: ../index.php?s=perfil&id=' . $id);
}