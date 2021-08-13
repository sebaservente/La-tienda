<?php

require '../../data/bootstrap.php';
require '../../libraries/productos.php';
require '../../libraries/carrito.php';

// tiene que estar autenticado para eliminar un producto
if(!authEstaAutenticado() || !authEsAdmin()) {
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}

$idPedido = $_GET['id'];

$exito = caEliminarPedidos($db, $idPedido);

if($exito){
    $_SESSION['success'] = "El Producto fue eliminado exitosamente";
    header('Location: ../index.php?s=leer-pedidos');
} else {
    $_SESSION['success_errors'] = "El producto NO pudo ser borrado. Problemas con el servidor, prueba otra vez. Si el problema persiste, comunicate con nosotros";
    header('Location: ../index.php?s=leer-pedidos');
}