<?php

function usuarioBuscaPorEmail($db, $email) {
    $email = mysqli_real_escape_string($db, $email);

    $query = "SELECT * FROM usuarios
                WHERE email = '". $email . "'";
    $res = mysqli_query($db, $query);
    
    // verificamos si llegan resultados

    if($fila = mysqli_fetch_assoc($res)){
        return $fila;
    } else {
        return null;
    }
}
/*
 * qparam mysqli $db
 * @param array $data
 *              email: Required. string.
 *              password: Required. string.
 *              nombre: Opcional. string.
 *              apellido: Opcional. string.
 *              id_rol: Opcional. int. Default
 * **/
function usuariosCrear($db, $data) {
    $idRol      = isset($data['idRol']) ? mysqli_real_escape_string($db, $data['idRol']) : 2;
    $email      = mysqli_real_escape_string($db, $data['email']);
    $password   = mysqli_real_escape_string($db, $data['password']);
    $nombre     = mysqli_real_escape_string($db, $data['nombre'] ?? '');
    $apellido   = mysqli_real_escape_string($db, $data['apellido'] ?? '');

    $query = "INSERT INTO usuarios (id_rol, email, password, nombre, apellido)
                VALUES ('" . $idRol . "','" . $email . "','" . $password . "','" . $nombre . "','" . $apellido . "' )";
    $exito = mysqli_query($db, $query);
    return $exito;

}