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

/*if(caUsuarioTieneProducto($db, $idCerveza, $idUsuario)){
    $_SESSION['success_errors'] = "¡ Este producto ya esta en tu carrtio !";
    header('Location: ../../index.php?s=productos');
    exit;
}*/

$exito = caAgregarProducto($db, $idCerveza, $idUsuario);



if($exito){
    $_SESSION['success'] = "¡ Se agrego el producto a tu carrtio !";
    header('Location: ../../index.php?s=productos');
    exit();
} else {
    $_SESSION['success_errors'] = "¡ No se pudo agregar el producto a tu carrtio !";
    header('Location: ../../index.php?s=productos');
}