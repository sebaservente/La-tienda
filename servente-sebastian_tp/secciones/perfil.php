<?php
require 'data/bootstrap.php';

$usuarios = usuarioTodos($db);
/*echo "<pre>";

print_r($usuario);
echo "</pre>";*/
/*if(!authEstaAutenticado()) {*/
    /*    $_SESSION['seccion_preten'] = $seccion;*/
/*    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}*/
?>
<section class="container">
    <h2>Perfil de Usuarios</h2>

    <table  class="table table-bordered table-striped">

        <thead>
        <tr>
            <th>Email: </th>
            <th>Nombre:</th>
            <th>Apellido:</th>
            <th>ID:</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <?php
        for ($i = 0; $i < 1; $i++) { ?>
        <tbody>
            <tr>
            <td><?=$usuarios['email'];?></td>
            <td><?=$usuarios['nombre']; ?></td>
            <td><?=$usuarios['apellido']; ?></td>
            <td><?=$usuarios['id_usuario']; ?></td>
            <td><a href="index.php?s=editar-usuario&id=<?= authObtenerUsuario()['id_usuario'];?>" class="p-2" >Editar usuario</a></td>
            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>

</section>
