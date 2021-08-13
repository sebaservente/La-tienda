<?php
require_once '../../data/bootstrap.php';
require_once '../../libraries/productos.php';
require_once '../../libraries/carrito.php';

if(!authEstaAutenticado()) {
    /*    $_SESSION['seccion_preten'] = $seccion;*/
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../../index.php?s=login');
    exit;
}

$idCerveza = $_GET['id'];
$idUsuario = authObtenerUsuario()['id_usuario'];

$product = productoPorId($db, $idCerveza);
if ($product === null){
    $_SESSION['success_errors'] = "¡ Este producto que trataste de quitar no exite !";
    header('Location: ../../index.php?s=carrito');
    exit;
}
$exito = caEliminarProducto($db, $idCerveza, $idUsuario);

if($exito){
    $_SESSION['success'] = "¡ El producto <b>" . $product['title'] . "</b> se quito de tu carrito !";
    header('Location: ../../index.php?s=carrito');
} else {
    $_SESSION['success_errors'] = "¡ No se pudo quitar el producto <b>" . $product['title'] . "</b> de tu carrtio !";
    header('Location: ../../index.php?s=carrito');
}