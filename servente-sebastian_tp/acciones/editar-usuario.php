<?php


require '../data/bootstrap.php';
require '../libraries/image.php';
/*require_once '../libraries/usuarios.php';
require_once '../libraries/auth.php';*/


$id = $_GET['id'];
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$apodo = trim($_POST['apodo']);
$imgAlt = trim($_POST['img-alt']);
$img = $_FILES['img'];

// todo validar
if(empty($email)){
    $errores['email'] = "Te estas olvidando el email";
}
if(empty($password)){
    $errores['password'] = "Te olvidaste el Password";
} else if(strlen($password) < 6){
    $errores['password'] = "Minimo 6 caracteres";
}
if(empty($nombre)){
    $errores['nombre'] = "Te estas olvidando el nombre";
}
if(empty($apellido)){
    $errores['apellido'] = "Te estas olvidando el apellido";
}
if(empty($apodo)){
    $errores['apodo'] = "Te estas olvidando el apodo";
}
if(!empty($errores)){
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=editar-usuario&id=' . $id);
    //importante
    exit;
}
$exito = usuarioEditar($db, $id, $email, $password, $nombre, $apellido, $apodo, $img, $imgAlt);

if($exito){

    $_SESSION['success'] = "El Usuario <b>" . $email . "</b> fue Editado con Exito";
    header('Location: ../index.php?s=perfil&id=' . $id);
} else {
    //echo "No se Cargo el producto !!  Algo salio mal !!";
    $_SESSION['old_data'] = $_POST;
    $_SESSION['success_errors'] = "Algo malio sal en el servidor, al Editar el producto, Prueba mas tarde !! si no Comunicate con nosotros";
    header('Location: ../index.php?s=perfil&id=' . $id);
}