<?php
require 'data/bootstrap.php';

$usuario = usuarioTodos($db);
echo "<pre>";
print_r($usuario);
echo "</pre>";
?>
<section class="container">
    <h2>Perfil de Usuarios</h2>
    <p>Email: <?= authObtenerUsuario()['email'] ?></p>
    <p>Nombre: <?= authObtenerUsuario()['nombre'] ?></p>
    <p>Apellido: <?= authObtenerUsuario()['apellido'] ?></p>
    <p>ID:<?= authObtenerUsuario()['id_usuario'] ?></p>
    <a href="index.php?s=editar-usuario&id=<?= authObtenerUsuario()['id_usuario'];?>">Editar usuario</a>
</section>
