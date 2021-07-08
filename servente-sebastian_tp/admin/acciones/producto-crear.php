<?php


require '../../data/bootstrap.php';
require '../../libraries/productos.php';
require '../../libraries/image.php';

// datos del formulario.
$title = trim($_POST['title']);
$intro = trim($_POST['intro']);
$text = trim($_POST['text']);
$definicion = trim($_POST['definicion']);
$precio = trim($_POST['precio']);
$imgAlt = trim($_POST['img-alt']);
$img = $_FILES['img'];

// validar formulario

$errores = [];
// titulo intro texto obligatorio, 3caracteres

if(empty($title)){
    $errores['title'] = "Te olvidaste el Titulo";
} else if(strlen($title) < 3){
    $errores['title'] = "Minimo 3 caracteres";
}

if(empty($intro)){
    $errores['intro'] = "Te estas olvidando el Intro";
} 

if(empty($precio)){
    $errores['precio'] = "Te estas olvidando el Precio";
}

if(!empty($errores)){
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=nuevo-producto');
    //importante 
    exit;
}

// en esta instancia se hardcodea el id_usuario hasta que tengamos uno
$idUser = 1;
// crea el producto.....
$exito = productoCrear($db, $title, $intro, $text, $definicion, $precio, $img, $imgAlt, $idUser);

if($exito){
    // Imprimimos un mensaje de éxito.
    $_SESSION['success'] = "El Producto <b>" . $title . "</b> fue Creado con Exito";
    header('Location: ../index.php?s=productos');
} else {
    //echo "No se Cargo el producto !!  Algo salio mal !!";
    $_SESSION['old_data'] = $_POST;
    $_SESSION['success_errors'] = "Algo malio sal en el servidor, al grabar el producto, Prueba mas tarde !! si no Comunicate con nosotros";
    header('Location: ../index.php?s=nuevo-producto');
}
