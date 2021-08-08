<?php
require 'data/bootstrap.php';
require 'libraries/carrito.php';
require 'libraries/productos.php';

$idUsuario = authObtenerUsuario()['id_usuario'];
/*$carrito = carritoTodos($db);*/
$product = traerProductosDelCarrito($db, $idUsuario);

/*echo"<pre>";
print_r($product);
echo"</pre>";
exit;*/
?>
<section>
    <h2>Carrito de compras</h2>
    <?php
    foreach ($product as $carritos): ?>
        <div class="border border-dark p-4">
            <p><?=$carritos['title'];?></p>
            <p><?=$carritos['precio'];?></p>
            <div class="divImagen">
                <figure>
                    <img src="imgs/<?= $carritos['img'];?>" class="img-fluid w-25 figure-img" alt="<?= htmlspecialchars($carritos['alt_img']);?>">
                </figure>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</section>
