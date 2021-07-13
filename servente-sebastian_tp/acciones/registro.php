<?php

require  '../data/bootstrap.php';
require '../libraries/usuarios.php';

$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

// todo validar
$idRol = 2;
$exito = usuariosCrear($db, [
    /*'idRol'     => $idRol,*/
    'email'     => $email,
    'password'  => $password,
    'nombre'    => $nombre,
    'apellido'  => $apellido,
]);

if ($exito){
    $_SESSION['success'] = "uUsuario creado.. modifcar texto" . $email . "!";
    header('Location: ../index.php?s=productos');
    exit;
}else{
    $_SESSION['success_errors'] = 'usuatrio no creardo modicar texto';
    header('Location: ../index.php?s=registro');
    exit;
}


