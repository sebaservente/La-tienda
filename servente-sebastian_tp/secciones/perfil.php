<?php
require 'data/bootstrap.php';

$usuarios = usuarioTraerPorId($db, $_GET['id']);

// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);

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
        <tbody>
            <tr>
            <td><?=$usuarios['email'];?></td>
            <td><?=$usuarios['nombre']; ?></td>
            <td><?=$usuarios['apellido']; ?></td>
            <td><?=$usuarios['id_usuario']; ?></td>
            <td><a href="index.php?s=editar-usuario&id=<?=$usuarios['id_usuario'];?>" class="p-2" >Editar usuario</a></td>
            </tr>
        </tbody>

    </table>

</section>
