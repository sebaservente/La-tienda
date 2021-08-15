<?php

/*
 * @param mysqli $db
 * @return array
 *
 * **/
function tagsTodos($db){
    $query = "SELECT * FROM tags";
    $resultados = mysqli_query($db, $query);
    $salida = [];
    while($fila = mysqli_fetch_assoc($resultados)) {
        $salida[] = $fila;
    }
    return $salida;
}