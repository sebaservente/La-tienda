<?php

require '../../data/bootstrap.php';
require '../../libraries/productos.php';
require '../../libraries/carrito.php';

// tiene que estar autenticado para eliminar un producto
if(!authEstaAutenticado() || !authEsAdmin()) {
    /*    $_SESSION['seccion_preten'] = $seccion;*/
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}

// eliminar archivos de la base de datos
$idPedido = $_GET['id'];
/*$idUsuario = authObtenerUsuario()['id_usuario'];*/


$exito = caEliminarPedidos($db, $idPedido);

if($exito){
    $_SESSION['success'] = "El Producto Fue eliminado Exitosamente";
    header('Location: ../index.php?s=leer-pedidos');
} else {
    $_SESSION['success_errors'] = "El producto No pudo ser borrado. Problemas con el Servidor, Prueba otra vez. Si el problema persiste, comunicate con nosotros";
    header('Location: ../index.php?s=leer-pedidos');
}