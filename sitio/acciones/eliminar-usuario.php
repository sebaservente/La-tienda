<?php

require '../data/bootstrap.php';
/*require '../libraries/productos.php';*/
//require '../../libraries/image.php';

// tiene que estar autenticado para eliminar un producto
/*if(!authEstaAutenticado() || !authEsAdmin()) {
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}*/

// eliminar archivos de la base de datos
$id = $_GET['id'];

$exito = usuarioBorrar($db, $id);

// cierro sesion
authLogout();

if($exito){
    $_SESSION['success'] = "El Usuario Fue eliminado Exitosamente";
    header('Location: ../index.php?s=login');
} else {
    $_SESSION['success_errors'] = "El Usuario No pudo ser borrado. Problemas con el Servidor, Prueba otra vez. Si el problema persiste, comunicate con nosotros";
    header('Location: ../index.php?s=login');
}
