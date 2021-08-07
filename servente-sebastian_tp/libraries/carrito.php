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