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
<section class="carritoCompras">
    <h2>Carrito de compras</h2>
    <?php
    if(count($product) > 0) :?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cerveza</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($product as $carritos):
                $total += $carritos['precio'];
                ?>
               <tr>
                   <td><?=$carritos['title'];?></td>
                   <td><?=$carritos['precio'];?></td>
                   <td><a href="acciones/carrito/eliminar.php?id=<?=$carritos['id_cerveza'];?>" class="text-danger">eliminar</a></td>
               </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <div class="text-center">
            <p>Cantidad de productos:  <?= count($product);?> </p>
            <p>Total a pagar:  $<?= $total;?> </p>
            <a href="#" class="btn btn-success">Finalizar Compra</a>
        </div>
    <?php
    else:?>
    <div class="text-center m-4 p-2 ">
        <p class="text-center text-justify">¿No sabes que comprar?</p>
        <p class="text-center text-justify">¡MIles de cervezas te esperan!</p>
        <p class="text-center text-justify"><a href="index.php?s=productos">Comenza a llenar el carrito ahora</a></p>
    </div>
    <?php
    endif;?>



</section>
