<?php
require 'libraries/productos.php';

// parametros de busqueda
$b = $_GET['b'] ?? null;

// datos de la paginacion
$pagCantidad = 6;

// numero de pagina con el casteo
$pagina = (int) ($_GET['p'] ?? 1);

// calculamos el inicio
$pagRegistroInicial = ($pagCantidad * $pagina) - $pagCantidad;

// parametros de busqueda
$productos = getProducto($db, [
        'b' => $b
], $pagCantidad, $pagRegistroInicial);

// pedimos la cantidad total de registros
$pagCantidadTotalRegistro = getProductosCantidadDeRegistro($db, [
    'b' => $b
]);

// calculamos el total de las piginas
// con ceil() redondea para arriba
$pagTotal = ceil($pagCantidadTotalRegistro / $pagCantidad);


?>
<section id="productos" class="container-fluid producto">
    <h2>Elige Tu Estilo</h2>
    <div>
        <!--<h3 class="h3Buscar">Busca la cerveza que más te identifique</h3>-->
        <form action="index.php" method="get" class="formRegistroBuscar">
            <input type="hidden" name="s" value="productos">
            <div class="form-file">
                <label for="b" >Tus cervezas favoritas</label>
                <input type="search" id="b" name="b" class="form-control" value="<?= $b;?>" placeholder="Buscar">
            </div>
            <button class="btn btn-light botonRegistroBuscar"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <p class="parrafoResultados">Mostrando <?= $pagCantidadTotalRegistro ;?> resulatdos de un total de <?= $pagCantidad;?> </p>


    <div class="divs">
        <?php
        foreach ($productos as $producto):
            $tags = !empty($producto['tags']) ? explode(' | ', $producto['tags']) : [];
        ?>
        <article class="articleProducto">
                <div class="divInfoProducto rounded">
                    <a href="index.php?s=leer-producto&id=<?= $producto['id_cerveza'];?>" class="text-dark" >
                        <h3><?= htmlspecialchars($producto['title']);?></h3>
                        <div class="productos_tags">
                            <?php
                            foreach ($tags as $tag):
                                $dataTags = explode(' => ', $tag);
                                ?>
                                <span class="productos_item_tags "><?= htmlspecialchars($dataTags[1]) ;?></span>
                            <?php
                            endforeach; ?>
                        </div>
                        <figure>
                            <img src="imgs/<?= $producto['img'];?>" class="img-fluid figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                        </figure>

                        <div class="divDatosProducto">
                           <!-- <p><?/*= htmlspecialchars($producto['title']);*/?></p>-->
                            <p><?= htmlspecialchars($producto['definicion']);?></p>
                            <p class="parrafoPrecio">Precio: $ <?= htmlspecialchars($producto['precio']);?></p>
                        </div>
                    </a>
                    <div class="botones text-center m-2 d-flex row justify-content-between">
                        <!--<a href="#" class="btn btn-success agregar text-light w-100 m-2"><i class="bi bi-cart-plus"></i>Agregar</a>-->
                        <a href="acciones/carrito/comprar.php?id=<?= htmlspecialchars($producto['id_cerveza']);?>" class="comprar btn btn-info text-light w-100 "><i class="bi bi-cart4 mr-2"></i>Comprar</a>
                    </div>
                </div>
        </article>
        <?php
        endforeach;
        ?>
    </div> 
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
    <?php
        if($pagTotal > 1):
    ?>
    <div class="paginador">
        <p>Paguinas</p>
        <ul class="paginador-lista">
            <?php if($pagina > 1): ?>
                <li><a href="index.php?s=productos&p=1&b=<?= $b;?>">Primera</a></li>
                <li><a href="index.php?s=productos&p=<?=($pagina - 1);?>&b=<?= $b;?>"><i class="bi bi-chevron-double-left"></i></a></li>
            <?php
            else: ?>
               <!-- <li>Inicio</li>-->
                <li><i class="bi bi-chevron-double-left"></i></li>
            <?php
            endif; ?>
            <?php
            for($i = 1; $i <= $pagTotal; $i++):
            ?>
            <?php
                if($i != $pagina):
            ?>
                <li><a href="index.php?s=productos&p=<?= $i;?>&b=<?= $b;?>"><?= $i;?></a></li>
            <?php
                else:
            ?>
                <li class="bg-warning"><b><?= $i;?></b></li>
            <?php
                endif;
            endfor;?>
            <?php if($pagina < $pagTotal): ?>
                <li><a href="index.php?s=productos&p=<?=($pagina + 1);?>&b=<?= $b;?>"><i class="bi bi-chevron-double-right"></i></a></li>
                <li><a href="index.php?s=productos&p=<?= $pagTotal;?>&b=<?= $b;?>">Ultima</a></li>
            <?php
            else: ?>
                <!-- <li>Final</li>-->
                <li><i class="bi bi-chevron-double-right"></i></li>
            <?php
            endif; ?>
        </ul>
    </div>
    <?php
    endif; ?>

</section>