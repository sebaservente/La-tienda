<?php

require_once  '../../data/bootstrap.php';
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
    $_SESSION['success_errors'] = "¡ Este producto que trataste de agregar no exite !";
    header('Location: ../../index.php?s=productos');
    exit;
}

if(caUsuarioTieneProducto($db, $idCerveza, $idUsuario)){
    $_SESSION['successInfo'] = "¡ Este producto ya esta en tu carrtio !";
    header('Location: ../../index.php?s=productos');
    exit;
}

$exito = caAgregarProducto($db, $idCerveza, $idUsuario);
$exito = caAgregarPedido($db, $idCerveza, $idUsuario);

if($exito){
    $_SESSION['success'] = "¡ Se agrego el producto <b>" . $product['title'] . "</b> a tu carrito !";
    header('Location: ../../index.php?s=productos');
} else {
    $_SESSION['success_errors'] = "¡ No se pudo agregar el producto " . $product['title'] . " a tu carrtio !";
    header('Location: ../../index.php?s=productos');
}