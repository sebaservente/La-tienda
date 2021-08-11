<?php

require_once '../../data/bootstrap.php';
require_once '../../libraries/productos.php';
require_once '../../libraries/carrito.php';

if (!authEstaAutenticado()) {
    /*    $_SESSION['seccion_preten'] = $seccion;*/
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../../index.php?s=login');
    exit;
}

$idCerveza = $_GET['id'];
$idUsuario = authObtenerUsuario()['id_usuario'];

$exito = caFinalizarPedido($db, $idCerveza, $idUsuario);

if ($exito) {
    $_SESSION['success'] = "¡ Gracias por su compra!";
    header('Location: ../../index.php?s=finalizar-compra');
    exit;
} else {
    $_SESSION['success_errors'] = "¡ No podemos cerrar la compra, algo esta mal en el servidor, vuelva mas tarde!";
    header('Location: ../../index.php?s=home');
}