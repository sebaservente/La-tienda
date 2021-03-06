<?php

/**
 * @param mysqli $db
 * @param int $idCerveza
 * @param int $idUsuario
 * @return bool
 * */
function caAgregarProducto ($db, $idCerveza, $idUsuario) {

    $idCerveza = mysqli_real_escape_string($db, $idCerveza);
    $idUsuario = mysqli_real_escape_string($db, $idUsuario);

    $query = "INSERT INTO carritos (cervezas_id_cerveza, id_usuario, fecha)
                VALUES ('" . $idCerveza  ."', '" . $idUsuario  ."', NOW() )";

    $exito = mysqli_query($db, $query);

    if ($exito){
        return true;
    }
    return false;
}

/**
 * @param mysqli $db
 * @param int $idCerveza
 * @param int $idUsuario
 * @return bool
 * */
/*function caUsuarioTieneProducto($db, $idCerveza, $idUsuario){
    $idCerveza = mysqli_real_escape_string($db, $idCerveza);
    $idUsuario = mysqli_real_escape_string($db, $idUsuario);
    $query = "SELECT * FROM carritos 
                WHERE cervezas_id_cerveza = '" . $idCerveza . "'
                AND id_usuario = '" . $idUsuario ."'";
    $res = mysqli_query($db, $query);
    return mysqli_num_rows($res) === 1;
}*/
/**
 * @param mysqli $db
 * @param mixed $id
 * @return array
 * **/
function carritoPorId($db, $id) {
    $id = mysqli_real_escape_string($db, $id);
    $query = "SELECT * FROM carritos 
                WHERE id_carrito = '". $id ."'";
    $res = mysqli_query($db, $query);

    if($fila = mysqli_fetch_assoc($res)){
        return $fila;
    } else {
        return null;
    }

}
/**
 * @param mysqli $db
 * **/
function carritoTodos($db) {
    $query = "SELECT * FROM carritos";

    $res = mysqli_query($db, $query);

    $salida = [];

    while ($fila = mysqli_fetch_assoc($res)){
        $salida[] = $fila;
    }
    return $salida;

}

/**
 * @param mysqli $db
 * @param int $idCerveza
 * @return array|null
 * **/
function productoPorId($db, $idCerveza) {
    $idCerveza =  mysqli_real_escape_string($db, $idCerveza);
    $query = "SELECT * FROM cervezas 
                WHERE id_cerveza =  '". $idCerveza ."'";

    $res = mysqli_query($db, $query);
    if ($fila = mysqli_fetch_assoc($res)) {
        return $fila;
    }
    return null;
}