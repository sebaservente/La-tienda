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
            <th>Imagen:</th>
            <th>Email: </th>
            <th>Nombre:</th>
            <th>Apellido:</th>
            <th>Apodo:</th>
            <th>ID:</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            <td><?=$usuarios['email'];?></td>
            <td><?=$usuarios['nombre']; ?></td>
            <td><?=$usuarios['apellido']; ?></td>
            <td><?=$usuarios['apodo']; ?></td>
            <td><?=$usuarios['id_usuario']; ?></td>
            <td><a href="index.php?s=editar-usuario&id=<?=$usuarios['id_usuario'];?>" class="p-2" >Editar usuario</a></td>
            </tr>
        </tbody>

    </table>
    <article>
        <div>
            <p>imagen</p>
           <!-- <figure>
                <img src="imgs/<?/*= $usuarios['img'];*/?>" class="img-fluid w-100 figure-img" alt="<?/*= htmlspecialchars($usuarios['alt_img']);*/?>">
            </figure>-->
        </div>
        <div>
            <p>Email: <?=$usuarios['email'];?></p>
            <p>Nombre: <?=$usuarios['nombre']; ?></p>
            <p>Apellido: <?=$usuarios['apellido']; ?></p>
            <p>Apodo: <?=$usuarios['apodo']; ?></p>
            <p>Id: <?=$usuarios['id_usuario']; ?></p>
            <p><a href="index.php?s=editar-usuario&id=<?=$usuarios['id_usuario'];?>" class="p-2 text-success" >Editar usuario</a></p>
            <p><a href="acciones/usuario-eliminar.php?id=<?=$usuarios['id_usuario'];?>" class="borrar text-danger">Eliminar usuario</a></p>
        </div>
    </article>
</section>
