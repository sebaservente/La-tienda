<?php

/**
 *
 *
 * */
require_once '../../data/bootstrap.php';
require_once '../../libraries/productos.php';
require_once '../../libraries/carrito.php';

/*echo"<pre>";
print_r($idCerveza);
echo"</pre>";
exit;*/
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

/*if(caUsuarioTieneProducto($db, $idCerveza, $idUsuario)){
    $_SESSION['success_errors'] = "¡ Este producto ya esta en tu carrtio !";
    header('Location: ../../index.php?s=productos');
    exit;
}*/

$exito = caAgregarProducto($db, $idCerveza, $idUsuario);



if($exito){
    $_SESSION['success'] = "¡ Se agrego el producto <b>" . $product['intro'] . "</b> a tu carrito !";
    header('Location: ../../index.php?s=productos');
} else {
    $_SESSION['success_errors'] = "¡ No se pudo agregar el producto " . $product['intro'] . " a tu carrtio !";
    header('Location: ../../index.php?s=productos');
}