<?php

$usuario = usuarioTodos($db);

?>
<section class="container-fluid producto" id="sectionPerfil">
    <h2 class="m-4">Perfil de Usuarios</h2>
    <p class="pIndex">Usuarios registrados</p>
    <div class="divs">
        <?php
        foreach ($usuario as $usuarios): ?>
        <article class="articleProducto">
            <div class="divInfoProducto rounded">
                <a href="" class="text-dark text-decoration-none">
                    <p title="<?=$usuarios['email']; ?>"><?=$usuarios['email'];?></p>
                    <figure>
                        <img src="../imgs/<?=$usuarios['img'];?>" class="img-fluid figure-img" alt="<?= htmlspecialchars($usuarios['alt_img']);?>">
                    </figure>
                    <div  class="divDatosProducto">
                        <p title="<?=$usuarios['nombre']; ?>">Nombre: <?=$usuarios['nombre']; ?></p>
                        <p title="<?=$usuarios['apellido']; ?>">Apellido: <?=$usuarios['apellido']; ?></p>
                        <p title="<?=$usuarios['apodo']; ?>" class="text-center">@ <?=$usuarios['apodo']; ?></p>
                       <!-- <div class="botones text-center m-2">
                            <a href="../index.php?s=editar-usuario&id=<?/*=$usuarios['id_usuario'];*/?>" class="comprar btn btn-info text-light w-100 " >Editar usuario</a>
                        </div>-->
                    </div>
                </a>
            </div>
        </article>
        <?php
        endforeach;
        ?>
    </div>
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
</section>