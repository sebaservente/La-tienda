<?php
/*
* host  // url de conexion al servidor
        // hosting real servidores distintos la base y el apache
* user  // usario de base de datos root (en xammp)
        // hosting se crea en panel de administracion en su propia cuenta
* pass  // vacio como en phpmyadmin salvo que estes en un hosting real
* base  // a la que me conecto
*/
// creamos conexion
ini_set('display_errors', 'Off');


const DB_HOST       = "localhost"; // o 127.0.0.1
const DB_USER       = "root";
const DB_PASS       = "";
const DB_BASE       = "la_tienda";
const DB_CHARSET    = "utf8mb4";

//para conectarme a mysql seria => mysqli para conectarme
//mysqli_connect recibe los 4 valores de la coneccion en el mismo orden de creacion.
//nos retorna uno de 2 valores a) coneccion a la base de datos 
// b) falso cuando coneccion falla por alguna razon
// quitar mensaje de error tres maneras
// 1)@ en mysqli => @mysqli_connect [no recomendada]
// 2) modificar en php.ini 
// 3) poner una function llamada ini_set() [recomendada]

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE);

// conexion exitosa . no se ve nada en pantalla 
// conexion fallida . veremos un msj error
if(!$db){
    //normalmente si la conexion falla abortamos la carga norml de la pagina
    /*echo " error al conectar con la base de datos " ;
    exit; */
    // die("Error al conectar con base de datos MySQL");
    /* require 'mantenimientos.php';*/
    header('Location: ../index.php?s=mantenimiento');
    exit;
}
//echo "<br> mi pagina esta conectada ";


mysqli_set_charset($db, DB_CHARSET);