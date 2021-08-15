<?php

//inicio la sesion
session_start();


// uso horario
date_default_timezone_set('America/Argentina/Buenos_Aires');

// constantes de rutas
const PATH_IMG = __DIR__ . "/../imgs";

// constante monto maximo por usuario
const CA_MONTO_MAXIMO = 5000;

// constante cantidad maxima de productos por usuario
const CA_CANTIDAD_MAXIMA = 12;

// constantes de estado
const ENVIROMENT_DEV = 0;
const ENVIROMENT_PROD = 1;
const ENVIROMENT_MANTAINANCE = 2;

// estado del entorno.
$enviromentState = ENVIROMENT_DEV;

// incluimos los archivos de sesiones, usuarios y de autenticacion
require_once __DIR__ . '/../libraries/sessiones.php';
require_once __DIR__ . '/../libraries/auth.php';
require_once __DIR__ . '/../libraries/usuarios.php';



// conexion a la base

require  __DIR__ . '/conexion.php';