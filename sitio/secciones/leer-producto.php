<?php

require 'libraries/productos.php';
//$productos = getProducto($db);

//$iProducto = $_GET['id'];
$producto = productosporid($db, $_GET['id']);
//$producto = $productos[$iProducto];
$tags = !empty($producto['tags']) ? explode(' | ', $producto['tags']) : [];
?>
<section class="container pt-3 productos">
    <h2><?= htmlspecialchars($producto['title']);?></h2>
    <div class="divs">
        <article class="articleProductos">
            <div class="divInfoProductos rounded">
                <a href="#" class="text-dark" id="a">
                    <h3><?= htmlspecialchars($producto['intro']);?></h3>
                    <div class="productos_tags">
                        <?php
                        foreach ($tags as $tag):
                            $dataTags = explode(' => ', $tag);
                            ?>
                            <span class="productos_item_tags"><?= htmlspecialchars($dataTags[1]) ;?></span>
                        <?php
                        endforeach; ?>
                    </div>
                    <figure>
                        <img src="imgs/<?= $producto['img'];?>" class="img-fluid w-100 figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                    </figure>
                    <p class="texto-descripcion"><?= htmlspecialchars($producto['text']);?></p>
                    <div>
                        <p class="precio-producto font-weight-bold">Precio: $<?= htmlspecialchars($producto['precio']);?></p>
                        <p class="definicion-producto"><?= htmlspecialchars($producto['definicion']);?></p>
                    </div>
                </a>
                <div class="botones text-center d-flex row justify-content-between">
                    <!--<a href="#" class="btn btn-success agregar text-light w-100 m-2"><i class="bi bi-cart-plus"></i>Agregar</a>-->
                    <a href="acciones/carrito/comprar.php?id=<?= htmlspecialchars($producto['id_cerveza']);?>" class="comprar btn btn-info text-light w-100 m-2"><i class="bi bi-cart4"></i>Comprar</a>
                </div>
            </div>
         </article>
    </div>
    <h4>PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
    
</section>