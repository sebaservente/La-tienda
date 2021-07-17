<?php

/*echo "hola mundo";*/
require_once '../data/bootstrap.php';
require_once '../data/conexion.php';
require_once '../libraries/usuarios.php';

// capturamos el email
$email = $_POST['email'];

// buscamos al usuario por email
$usuario = usuarioBuscaPorEmail($db, $email);

if (!$usuario){
    $_SESSION['success_errors'] = 'El email ingresado no coincide con ningun email registrado. Por favor revisa que este correcto el email';
    header('Location: ../index.php?s=recuperar-password');
    exit;
}

$token = usuarioGenerarTokenRecu($db, $usuario['id_usuario']);

$cuerpo = <<<TEMPLATE
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Tienda :: Recuperar Contraseña</title>
</head>
<body>
    <section style="font-family: Verdana, Arial, sans-serif">
      <h2>Recuperar Contraseña</h2>
      <p>Recibimos un pedido de esta direccion <b>"xx@xx.xx"</b> para restablecer la contraseña de la cuenta asociada</p>
      <p>Para proceder. hace click en el enlace a continuacion, o copia el texto del enlace y pegalo en la barra de direcciones de una pestaña en el navegador.</p>
      <a href="#">Ir a Restablecer mi Contraseña</a>
      <p>Enlace para copiar: #</p>
      <p style="font-size: .9em">si no fuiste vos el que pidio restablecer la contraseña, podes simplemente ignorar este email.</p>
    </section>
</body>
</html>
TEMPLATE;

