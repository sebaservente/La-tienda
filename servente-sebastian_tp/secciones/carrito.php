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
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Cerveza</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Acciones</th>
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
                   <td><a href="acciones/carrito/eliminar.php?id=<?=$carritos['id_cerveza'];?>" class="text-danger d-flex justify-content-center"><i class="bi bi-trash text-danger"></i></a></td>
               </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <div class="text-center">
            <p class="cantidadCarrito">Cantidad de productos:  <?= count($product);?> </p>
            <p class="totalCarrito">Total a pagar:  $<?= $total;?> </p>
            <p class="parrafoBotones">
                <a href="index.php?s=productos" class="btn btn-info m-2">Seguir Comprando</a>
                <a href="#" class="btn btn-success m-2">Finalizar Compra</a>
            </p>

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
