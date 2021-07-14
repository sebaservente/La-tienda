<?php 

require_once  __DIR__ . '/usuarios.php';

/*
 * @param array $data
 * **/
function authSetLogin($userData){
    $_SESSION['usuario_admin'] = $userData;
}

function authLogin($db, $email, $password) { 

     $usuario = usuarioBuscaPorEmail($db, $email);

    if($usuario !== null){

        if(password_verify($password, $usuario['password'])){

            // se guarda con el id    
            //$_SESSION['id_usuario_admin'] = $usuario['id_usuario'];
                
            // o se guarda todos los datos que interesen
            /*$_SESSION['usuario_admin'] = [
                'id_usuario' => $usuario['id_usuario'],
                'email' => $usuario['email'],
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'id_rol' => $usuario['id_rol'],

            ];*/
            authSetLogin([
                'id_usuario' => $usuario['id_usuario'],
                'email' => $usuario['email'],
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'id_rol' => $usuario['id_rol'],

            ]);
            return true;
        }
    }
    return false;
}

function authLogout() {
    unset($_SESSION['usuario_admin']);
}

// confirmamos si esta autenticado
function authEstaAutenticado() {
    return isset($_SESSION['usuario_admin']);
}

// usuario autenticado
function authObtenerUsuario(){
    return $_SESSION['usuario_admin'];
}

