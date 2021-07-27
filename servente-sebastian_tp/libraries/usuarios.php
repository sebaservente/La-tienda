<?php
/**
 * @param mysqli $db
 * @param $email
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
 * **/
function usuarioTodos($db) {
        $query = "SELECT * FROM usuarios";

        $res = mysqli_query($db, $query);

        $salida = [];

        while ($fila = mysqli_fetch_assoc($res)){
            $salida[] = $fila;
        }
        return $salida;
        //$fileName = "api/productos.json";
        //$contenido = file_get_contents(PRODUCTOS_JSON_FILEPATH);
        //return json_decode($contenido, true);

}
/**
 * @param mysqli $db
 * @param mixed $id
 * @return array
 * **/
function usuarioTraerPorId($db, $id) {
    $id = mysqli_real_escape_string($db, $id);
    $query = "SELECT * FROM usuarios 
                WHERE id_usuario = '". $id ."'";
    $res = mysqli_query($db, $query);

    return mysqli_fetch_assoc($res);
}

/**
 * @param mysqli $db
 * @param array $data
 * @param string $img
 *              email: Required. string.
 *              password: Required. string.
 *              nombre: Opcional. string.
 *              apellido: Opcional. string.
 *              apodo: Opcional. string.
 *              id_rol: Opcional. int. Default
 * @return boll|int
 * **/
function usuariosCrear($db, $data) {

    $idRol      = isset($data['idRol']) ? mysqli_real_escape_string($db, $data['idRol']) : 2;
    $email      = mysqli_real_escape_string($db, $data['email']);
    $nombre     = mysqli_real_escape_string($db, $data['nombre'] ?? '');
    $apellido   = mysqli_real_escape_string($db, $data['apellido'] ?? '');
    $apodo      = mysqli_real_escape_string($db, $data['apodo'] ?? '');
    $password   = password_hash($data['password'], PASSWORD_DEFAULT);
    $imgAlt     = mysqli_real_escape_string($db, $data['img-alt'] ?? '');
    $img    = mysqli_real_escape_string($db, $data['img'] ?? '');

    $nombreImagenes = generateSiteImages($img, PATH_IMG . "/", null, true);



    $query = "INSERT INTO usuarios (id_rol, email, password, nombre, apellido, apodo, img, alt_img)
                VALUES ('" . $idRol . "','" . $email . "','" . $password . "','" . $nombre . "','" . $apellido . "','" . $apodo . "','" . $nombreImagenes['name'] . "','" . $imgAlt . "')";
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
 * @param string $apodo
 * @return bool
 * **/
function usuarioEditar($db, $id, $email, $password, $nombre, $apellido, $apodo) {
    $id = mysqli_real_escape_string($db, $id);
    $email = mysqli_real_escape_string($db, $email);
    $password = password_hash($password, PASSWORD_DEFAULT);
    /*$password = mysqli_real_escape_string($db, $password);*/
    $nombre = mysqli_real_escape_string($db, $nombre);
    $apellido = mysqli_real_escape_string($db, $apellido);
    $apodo = mysqli_real_escape_string($db, $apodo);


    $query = "UPDATE usuarios
            SET email       = '" . $email . "', 
                password    = '" . $password . "',
                nombre      = '" . $nombre . "',
                apellido    = '" . $apellido . "',
                apodo       = '" . $apodo . "'
            WHERE id_usuario  = '" . $id . "'";

    $exito = mysqli_query($db, $query);
    if ($exito){
        return true;
    }
    return false;

}
/**
 * @param mysqli $db
 * @param $id
 * **/
function usuarioBorrar($db, $id) {
    // siempre escapamos valores que vienen del usuario
    $id =  mysqli_real_escape_string($db, $id);
    $query = "DELETE FROM usuarios
              WHERE id_usuario = '" . $id . "'";

    $exito = mysqli_query($db, $query);

    return $exito;
    //  *  return mysqli_query($db, $query);
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