<?php

require '../libraries/productos.php';
//$productos = getProducto($db);

//$iProducto = $_GET['id'];
$producto = productosporid($db, $_GET['id']);
//$producto = $productos[$iProducto];

?>
<section class="container pt-3 producto-descripcion">
    <h2><?= htmlspecialchars($producto['title']);?></h2>
    <div class="div-producto">
       
        <figure>                      
            <img src="imgs/<?= $producto['img'];?>" class="img-fluid w-100 figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
        </figure>
        <h3><?= htmlspecialchars($producto['intro']);?></h3>
        <p class="texto-descripcion"><?= htmlspecialchars($producto['text']);?></p>
        <p class="precio-producto">Precio: $<?= htmlspecialchars($producto['precio']);?></p>
        <p class="definicion-producto"><?= htmlspecialchars($producto['definicion']);?></p>
        <button class="agregar">Sumar al Carrito</button>
        <button class="comprar">Comprar</button>              
    </div>
    <h4>PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
    
</section>