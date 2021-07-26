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
<section class="container" id="sectionPerfil">
    <h2 class="text-center m-3">Perfil de Usuarios</h2>
    <!--<table  class="table table-bordered table-striped">

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
            <td><?/*=$usuarios['email'];*/?></td>
            <td><?/*=$usuarios['nombre']; */?></td>
            <td><?/*=$usuarios['apellido']; */?></td>
            <td><?/*=$usuarios['apodo']; */?></td>
            <td><?/*=$usuarios['id_usuario']; */?></td>
            <td><a href="index.php?s=editar-usuario&id=<?/*=$usuarios['id_usuario'];*/?>" class="p-2" >Editar usuario</a></td>
            </tr>
        </tbody>

    </table>-->
    <article class="perfil">
        <div class="divImagen">
            <figure>
                <img src="imgs/<?= $usuarios['img'];?>" class="img-fluid figure-img" alt="<?= htmlspecialchars($usuarios['alt_img']);?>">
            </figure>
        </div>
        <div class="divDatos">
            <p>Email: <?=$usuarios['email'];?></p>
            <p>Nombre: <?=$usuarios['nombre']; ?></p>
            <p>Apellido: <?=$usuarios['apellido']; ?></p>
            <p>Apodo: <?=$usuarios['apodo']; ?></p>
            <p>Id: <?=$usuarios['id_usuario']; ?></p>
            <div class="divAccion">
                <p><i class="bi bi-pencil-square text-success"></i><a href="index.php?s=editar-usuario&id=<?=$usuarios['id_usuario'];?>" class="p-2 text-success" >Editar </a></p>
                <p><i class="bi bi-trash text-danger"></i><a href="acciones/usuario-eliminar.php?id=<?=$usuarios['id_usuario'];?>" class="borrar p-2 text-danger">Eliminar</a></p>
            </div>
        </div>
    </article>
</section>
<script>
    window.addEventListener('DOMContentLoaded', function(){
        const linksEliminar = document.querySelectorAll('.borrar');
        linksEliminar.forEach(function(aElem) {
            aElem.addEventListener('click', function(ev){
                if(!confirm('estas seguro de eliminar tu cuenta!')){
                    ev.preventDefault();
                }
            });
        });
    });
</script>