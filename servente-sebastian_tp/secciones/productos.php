<?php
require 'libraries/productos.php';

// parametros de busqueda
$b = $_GET['b'] ?? null;

// datos de la paginacion
$pagCantidad = 4;

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
        <h3>Busca la cerveza que más te identifique</h3>
        <form action="index.php" method="get" class="formRegistroBuscar">
            <input type="hidden" name="s" value="productos">
            <div class="form-file">
                <label for="b">Buscar</label>
                <input type="search" id="b" name="b" class="form-control" value="<?= $b;?>">
            </div>
            <button class="btn btn-success botonRegistroBuscar"><i class="bi bi-search"> Buscar</i></button>
        </form>
    </div>
    <p class="parrafoResultados">Mostrando <?= $pagCantidad;?> resulatdos de un total de <?= $pagCantidadTotalRegistro;?> </p>


    <div class="divs">
        <?php
        foreach ($productos as $producto):
            $tags = !empty($producto['tags']) ? explode(' | ', $producto['tags']) : [];
        ?>
        <article class="articleProducto">
                <div class="divInfoProducto">
                    <a href="index.php?s=leer-producto&id=<?= $producto['id_cerveza'];?>" class="text-dark" >
                        <h3><?= htmlspecialchars($producto['intro']);?></h3>
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
                            <p><?= htmlspecialchars($producto['title']);?></p>
                            <p><?= htmlspecialchars($producto['definicion']);?></p>
                            <p class="parrafoPrecio">Precio: $ <?= htmlspecialchars($producto['precio']);?></p>
                        </div>
                    </a>    
                    <!--<button class="text-dark btn btn-success w-100" >Comprar </button>-->
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
                <li><a href="index.php?s=productos&p=<?=($pagina - 1);?>&b=<?= $b;?>"> <<< </a></li>
            <?php
            else: ?>
               <!-- <li>Inicio</li>-->
                <li> <<< </li>
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
                <li><a href="index.php?s=productos&p=<?=($pagina + 1);?>&b=<?= $b;?>"> >>> </a></li>
                <li><a href="index.php?s=productos&p=<?= $pagTotal;?>&b=<?= $b;?>">Ultima</a></li>
            <?php
            else: ?>
                <!-- <li>Final</li>-->
                <li> >>> </li>
            <?php
            endif; ?>
        </ul>
    </div>
    <?php
    endif; ?>

</section>