<?php 
/*
*
* vamos hacer consulta con la base de daros desde php
*/
// 1) incluimos la conexion

require 'conexion.php';

// 2) armamos la consulta 'como string'

$query = "SELECT * FORM cervezas";

//  ejecutamos  $query con una funcion coon 2 parametros
// 1) la conexion ala base
// 2) la consulta
// resultado puede trae 3 valores
// si falla devuelve un error, retorna false
// si tiene exito  y es un SELECT, retorna un resultset
// si tiene exito y NO es un SELECT, retorna true

$res = mysqli_query($db, $query);

// verificamos si tuvo exito o fallo

if($res === false){
   // echo "Erros en el query";
   echo mysqli_error($db);
}

while ($fila = mysqli_fetch_assoc($res)){
    
    echo "id: " . $fila['id_cerveza'] . "<br>";
    echo "title" . $fila['title'] . "<hr>";
}



 