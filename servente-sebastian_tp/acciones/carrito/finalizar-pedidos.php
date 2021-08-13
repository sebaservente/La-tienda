<?php
require_once '../../data/bootstrap.php';
require_once '../../libraries/productos.php';
require_once '../../libraries/carrito.php';

/*if(!authEstaAutenticado()) {
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../../index.php?s=login');
    exit;
}*/

/*$idPedido = $_GET['id_pedido'];*/
/*$idPedido = leerProductosDelCarrito($db)['id_pedido'];*/
/*$idUsuario = authObtenerUsuario()['id_usuario'];*/
/*echo"<pre>";
print_r($idPedido);
echo"</pre>";
exit;*/
/*$product = productoPorId($db, $idPedido);
if ($product === null){
    $_SESSION['success_errors'] = "¡ Este producto que trataste de quitar no exite !";
    header('Location: ../../index.php?s=leer-pedidos');
    exit;
}*/
$exito = caEliminarPedidos($db);

if($exito){
    $_SESSION['success'] = "¡ El producto se quito de los pedidos !";
    header('Location: ../../index.php?s=productos');
    exit;
} else {
    $_SESSION['success_errors'] = "¡ No se pudo quitar el producto de tu carrtio !";
    header('Location: ../../index.php?s=productos');
    exit;
}