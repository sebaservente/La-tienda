<?php

//inicio la sesion
session_start();


// uso horario
date_default_timezone_set('America/Argentina/Buenos_Aires');

// constantes de rutas
const PATH_IMG = __DIR__ . "/../imgs";

// constantes de estado
const ENVIROMENT_DEV = 0;
const ENVIROMENT_PROD = 1;
const ENVIROMENT_MANTAINANCE = 2;

// estado del entorno.
$enviromentState = ENVIROMENT_DEV;

// conexion a la base

require  __DIR__ . '/conexion.php';