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
                    <th class="text-center">Productos</th>
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
                   <td class="text-center"><?=$carritos['title'];?></td>
                   <td class="text-center">$<?=$carritos['precio'];?></td>
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
                <a href="index.php?s=productos" class="btn btn-info m-2"><i class="bi bi-cart-plus mr-2"></i>Seguir Comprando</a>
                <a href="acciones/carrito/finalizar-compra.php?id=<?=$carritos['id_cerveza'];?>" class="btn btn-success m-2"><i class="bi bi-cart-check mr-2"></i>Finalizar Compra</a>
            </p>

        </div>
    <?php
    else:?>
    <div class="avisoCompra">
        <p class="text-center text-justify">¿No sabes que comprar?</p>
        <p class="text-center text-justify">¡MIles de productos te esperan!</p>
        <a href="index.php?s=productos" class="text-light btnAvisoCompra text-center text-justify btn btn-info">¡Comenzar ahora!</a>
    </div>
    <?php
    endif;?>
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>


</section>
