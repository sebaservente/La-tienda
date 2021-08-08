<?php
require 'libraries/carrito.php';
require 'libraries/productos.php';

$carrito = carritoTodos($db);
$product = traerProductosDelCarrito($db, $user['id_cerveza']);
/*$productos = productoPorId($db, $idCerveza);*/
echo"<pre>";
print_r($carrito);
echo"</pre>";
/*exit;*/
?>
<section>
    <h2>Carrito de compras</h2>
    <?php
/*    foreach ($product as $producto): */?><!--
    <p><?/*=$producto['title'];*/?></p>
    --><?php
/*    endforeach;
    */?>
    <?php
    foreach ($carrito as $carritos): ?>
        <div class="border border-dark p-4">
            <p><?=$carritos['cervezas_id_cerveza'];?></p>
            <p><?=$carritos['id_usuario'];?></p>
            <p><?=$carritos['fecha'];?></p>
        </div>
    <?php
    endforeach;
    ?>
</section>
