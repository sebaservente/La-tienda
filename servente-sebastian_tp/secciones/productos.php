<?php
require 'libraries/productos.php';

$b = $_GET['b'] ?? null;

$productos = getProducto($db, [
        'b' => $b
]);

?>
<section id="productos" class="container-fluid producto">
   
    <h2 class="col-12 text-center">Elige Tu Estilo</h2>
    <div>
        <h3>Buscar Cervezas</h3>
        <form action="index.php" method="get" class="formRegistro">
            <input type="hidden" name="s" value="productos">
            <div class="form-file">
                <label for="b">Buscar</label>
                <input type="search" id="b" name="b" class="form-control" value="<?= $b;?>">
            </div>
            <button class="btn btn-success botonRegistro">Buscar</button>
        </form>
    </div>
    <div class="divs">
        <?php
        foreach ($productos as $producto):
            $tags = !empty($producto['tags']) ? explode(' | ', $producto['tags']) : [];
        ?>
       
        <article>       
                <div class="bg-light">
                    <a href="index.php?s=leer-producto&id=<?= $producto['id_cerveza'];?>" class="text-dark" >
                        <h3><?= htmlspecialchars($producto['title']);?></h3>
                        <div class="productos_tags">
                            <?php
                            foreach ($tags as $tag):
                                $dataTags = explode(' => ', $tag);
                            ?>
                            <span class="productos_item_tags"><?= htmlspecialchars($dataTags[1]) ;?></span>
                            <?php
                            endforeach; ?>
                        </div>
                        <p><?= htmlspecialchars($producto['intro']);?></p>
                        <p><?= htmlspecialchars($producto['definicion']);?></p>
                    </a>    
                    <button class="text-dark" >Comprar </button>     
                </div>
                <figure>                      
                    <img src="imgs/<?= $producto['img'];?>" class="img-fluid w-100 figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                </figure>
                <p class="ch5">Precio: <?= htmlspecialchars($producto['precio']);?></p> 
        </article>
      
        <?php
        endforeach;
        ?>
    </div> 
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
</section>