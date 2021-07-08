<?php
require 'libraries/productos.php';
$productos = getProducto($db);
?>
<section id="productos" class="container-fluid producto">
   
        <h2 class="col-12 text-center">Elige Tu Estilo</h2>
   
    <div class="divs">
        <?php
        foreach ($productos as $producto): 
        ?>
       
        <article>       
                <div class="bg-light">
                    <a href="index.php?s=leer-producto&id=<?= $producto['id_cerveza'];?>" class="text-dark" >
                        <h3><?= htmlspecialchars($producto['title']);?></h3>
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