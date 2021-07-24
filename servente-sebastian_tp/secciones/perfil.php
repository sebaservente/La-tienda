<?php
require 'data/bootstrap.php';

$usuario = usuarioTodos($db);
/*echo "<pre>";
print_r($usuario);
echo "</pre>";*/
if(!authEstaAutenticado()) {
    /*    $_SESSION['seccion_preten'] = $seccion;*/
    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}
?>
<section class="container">
    <h2>Perfil de Usuarios</h2>
    <?php
    foreach ($usuario as $usuarios):
    ?>
    <div>
        <p>Email: <?=$usuarios['email'];?></p>
        <p>Nombre: <?= $usuarios['nombre']; ?></p>
        <p>Apellido: <?=$usuarios['apellido']; ?></p>
        <p>ID:<?=$usuarios['id_usuario']; ?></p>
        <a href="index.php?s=editar-usuario&id=<?= authObtenerUsuario()['id_usuario'];?>">Editar usuario</a>
    </div>
    <?php
    endforeach;
    ?>
</section>
