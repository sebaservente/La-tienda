<?php 
/*
*
* vamos hacer consulta con la base de daros desde php
*/
// 1) incluimos la conexion

require 'conexion.php';

// 2) armamos la consulta 'como string'

$query = "SELECT * FROM cervezas
        WHERE id_cerveza = 100 ";

//  ejecutamos  $query con una funcion coon 2 parametros
// 1) la conexion ala base
// 2) la consulta
// resultado puede trae 3 valores
// si falla devuelve un error, retorna false
// si tiene exito  y es un SELECT, retorna un resultset
// si tiene exito y NO es un SELECT, retorna true

$res = mysqli_query($db, $query);

// verificamos que llegue la fila

$cantFilas = mysqli_num_rows($res);

if ($cantFilas > 0){

    echo "mostrando " . $cantFilas . "cervezas<br>";

    while ($fila = mysqli_fetch_assoc($res)){
        //echo "<pre>";
        //print_r($fila);
        //echo "</pre>";
        echo "id: " . $fila['id_cerveza'] . "<br>";
        echo "title" . $fila['title'] . "<hr>";
    }
} else {
    echo "<p>no hay noticias para mostrar</p>";
}

// vemos detalles del resultado

/* echo "<pre>";
*  print_r($res);
*  echo "</pre>";
*/
// obtenemos la rimera fila de resultset

// mysqli_fetch_assoc retorna la filas como una array de la columna
// si no hay filas retorna false
// podemos recorrer el bucle completo con un while 


 
