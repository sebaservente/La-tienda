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
function usuariosCrear() {

}