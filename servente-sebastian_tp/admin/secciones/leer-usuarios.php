<?php
require '../data/bootstrap.php';

$usuario = usuarioTodos($db);

/*echo "<pre>";
print_r($usuario);
echo "</pre>";*/
?>
<section class="container" id="sectionPerfil">
    <h2 class="m-4">Perfil de Usuarios</h2>
    <table  class="table table-bordered table-striped">

        <thead>
        <tr>
            <th>Imagen:</th>
            <th>Email: </th>
            <th>Nombre:</th>
            <th>Apellido:</th>
            <th>Apodo:</th>
            <th>ID:</th>
            <!--<th>Acciones</th>-->
        </tr>
        </thead>
        <tbody>

            <?php
            foreach ($usuario as $usuarios): ?>
            <tr>
                <td class="text-center">
                    <figure>
                        <img src="../imgs/<?=$usuarios['img'];?>" class="img-fluid w-50 figure-img" alt="<?= htmlspecialchars($usuarios['alt_img']);?>">
                    </figure>
                </td>
                <td><?=$usuarios['email'];?></td>
                <td><?=$usuarios['nombre']; ?></td>
                <td><?=$usuarios['apellido']; ?></td>
                <td><?=$usuarios['apodo']; ?></td>
                <td><?=$usuarios['id_usuario']; ?></td>
                <!--<td><a href="index.php?s=editar-usuario&id=<?/*=$usuarios['id_usuario'];*/?>" class="p-2" >Editar usuario</a></td>-->
            </tr>
            <?php
            endforeach;
            ?>
</tbody>

</table>