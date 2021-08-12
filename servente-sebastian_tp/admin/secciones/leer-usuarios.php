<?php
require '../data/bootstrap.php';

$usuario = usuarioTodos($db);

/*echo "<pre>";
print_r($usuario);
echo "</pre>";*/
?>
<section class="container-fluid producto" id="sectionPerfil">
    <h2 class="m-4">Perfil de Usuarios</h2>
    <div class="divs">
        <?php
        foreach ($usuario as $usuarios): ?>
        <article class="articleProducto">
            <div class="divInfoProducto rounded">
                <a href="#" class="text-dark text-decoration-none" >
                    <p title="<?=$usuarios['email']; ?>"><?=$usuarios['email'];?></p>
                    <figure>
                        <img src="../imgs/<?=$usuarios['img'];?>" class="img-fluid figure-img" alt="<?= htmlspecialchars($usuarios['alt_img']);?>">
                    </figure>
                    <div  class="divDatosProducto">

                        <p title="<?=$usuarios['nombre']; ?>">Nombre: <?=$usuarios['nombre']; ?></p>
                        <p title="<?=$usuarios['apellido']; ?>">Apellido: <?=$usuarios['apellido']; ?></p>
                        <p title="<?=$usuarios['apodo']; ?>">Apodo: <?=$usuarios['apodo']; ?></p>
                        <!--<p><?/*=$usuarios['id_usuario']; */?></p>-->
                        <!--<p><a href="index.php?s=editar-usuario&id=<?/*=$usuarios['id_usuario'];*/?>" class="p-2" >Editar usuario</a></p>-->
                    </div>
                </a>
            </div>
        </article>
        <?php
        endforeach;
        ?>
    </div>
</section>