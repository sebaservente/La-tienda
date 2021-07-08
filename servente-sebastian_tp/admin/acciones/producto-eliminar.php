<?php 

require '../../data/bootstrap.php';
require '../../libraries/productos.php';
//require '../../libraries/image.php';

// eliminar archivos de la base de datos 
$id = $_GET['id'];

$exito = productoBorrar($db, $id);

if($exito){
    $_SESSION['success'] = "El Producto Fue eliminado Exitosamente";
    header('Location: ../index.php?s=productos');
} else {
    $_SESSION['success_errors'] = "El producto No pudo ser borrado. Problemas con el Servidor, Prueba otra vez. Si el problema persiste, comunicate con nosotros";
    header('Location: ../index.php?s=productos');
}