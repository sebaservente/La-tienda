<?php
/*
 * @param $db
 * **/
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
/**
 * @param mysqli $db
 * @param array $data
 *              email: Required. string.
 *              password: Required. string.
 *              nombre: Opcional. string.
 *              apellido: Opcional. string.
 *              id_rol: Opcional. int. Default
 * @return boll|int
 * **/
function usuariosCrear($db, $data) {
    $idRol      = isset($data['idRol']) ? mysqli_real_escape_string($db, $data['idRol']) : 2;
    $email      = mysqli_real_escape_string($db, $data['email']);
    $nombre     = mysqli_real_escape_string($db, $data['nombre'] ?? '');
    $apellido   = mysqli_real_escape_string($db, $data['apellido'] ?? '');
    $password   = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (id_rol, email, password, nombre, apellido)
                VALUES ('" . $idRol . "','" . $email . "','" . $password . "','" . $nombre . "','" . $apellido . "' )";
    $exito = mysqli_query($db, $query);
    if ($exito){
        return mysqli_insert_id($db);
    }
    return false;

}
/**
 * @param mysqli $db
 * @param string $email
 * @param string $password
 * @param string $nombre
 * @param string $apellido
 * @return bool
 * **/
function usuarioEditar($db, $id, $email, $nombre, $apellido, $password) {
    $id = mysqli_real_escape_string($db, $id);
    $email = mysqli_real_escape_string($db, $email);
    $nombre = mysqli_real_escape_string($db, $nombre);
    $apellido = mysqli_real_escape_string($db, $apellido);
    $password = mysqli_real_escape_string($db, $password);

    $query = "UPDATE usuarios
            SET email = '" . $email . "', 
                nombre = '" . $nombre . "',
                apellido = '" . $apellido . "',
                password = '" . $password . "',
            WHERE id_usuario  = '" . $id . "'";

    $exito = mysqli_query($db, $query);
    if ($exito){
        return true;
    }
    return false;

}



/**
 * generamos un token (criptograficamente !!)seguro
 *
 * @param mysqli $db
 * @param int|string $id
 * @return string|bool
 * **/
function usuarioGenerarTokenRecu($db, $id) {
    $token = openssl_random_pseudo_bytes(32);

    $token = bin2hex($token);

    $fechaExpiracion = time() + 3600;
    $fechaExpiracion = date("Y-m-d H:i:s", $fechaExpiracion);

    $query = "INSERT INTO password_recuperar (id_usuario, token, fecha_expiracion) 
              VALUES ('". $id ."','". $token ."','". $fechaExpiracion ."')";
    $exito = mysqli_query($db, $query);
    if(!$exito){
         return false;
    }
    return $token;
}
/**
 * Verificamos el token del usuario
 *
 * @param mysqli $db
 * @param string $token
 * @param string $email
 * @return array|bool
 * **/
function usuarioTokenRecuperarValido($db, $token, $email){
    $token = mysqli_real_escape_string($db, $token);
    $email = mysqli_real_escape_string($db, $email);
    $query = "SELECT * FROM usuarios u 
                INNER JOIN password_recuperar pr 
                ON u.id_usuario = pr.id_usuario 
                WHERE pr.token = '" . $token . "' 
                AND u.email = '" . $email . "' 
                AND pr.fecha_expiracion >= NOW()";
    $resultado = mysqli_query($db, $query);
    $fila = mysqli_fetch_assoc($resultado);

    if($fila === false){
        return false;
    }

    return $fila;
}
/**
 * Actualizamos la contraseña del usuario
 *
 * @param mysqli $db
 * @param int|string $id
 * @param string $passaword
 * **/
function usuarioActualizarPassword($db, $id, $password){
    $id = mysqli_real_escape_string($db, $id);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE usuarios 
                SET password = '" . $password . "' 
                WHERE id_usuario = '" . $id . "'";
    $exito = mysqli_query($db, $query);

    return $exito;
}
/**
 * Eliminamos el token
 *
 * @param mysqli $db
 * @param srting $token
 * **/
function usuarioTokenEliminar($db, $token){
    $token = mysqli_real_escape_string($db, $token);

    $query = "DELETE FROM password_recuperar 
                WHERE token = '" . $token . "'";
    $exito = mysqli_query($db, $query);

    return $exito;
}