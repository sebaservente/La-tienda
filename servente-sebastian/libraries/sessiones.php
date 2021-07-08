<?php 
/**
 *  valor por defecto a retornar
 *
 * */


function sessionValueGetFlash($key, $default = null) {
    if(isset($_SESSION[$key])) {
        $returnValue = $_SESSION[$key];
        unset($_SESSION[$key]);
    } else {
        $returnValue = $default;
    }
    return $returnValue;
}