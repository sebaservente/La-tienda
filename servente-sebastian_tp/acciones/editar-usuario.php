<?php


require  '../data/bootstrap.php';
require_once '../libraries/usuarios.php';
require_once '../libraries/auth.php';


$id = $_GET['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$exito = usuarioEditar($db, $id, $email, $password, $nombre,$apellido);

if($exito){

    $_SESSION['success'] = "El Producto <b>" . $email . "</b> fue Editado con Exito";
    header('Location: ../index.php?s=productos');
} else {
    //echo "No se Cargo el producto !!  Algo salio mal !!";
    $_SESSION['old_data'] = $_POST;
    $_SESSION['success_errors'] = "Algo malio sal en el servidor, al Editar el producto, Prueba mas tarde !! si no Comunicate con nosotros";
    header('Location: index.php?s=perfil&id=' . $id);
}