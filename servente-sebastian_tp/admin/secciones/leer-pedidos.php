<?php
require '../data/bootstrap.php';
require '../libraries/carrito.php';
require '../libraries/productos.php';

$idUsuario = authObtenerUsuario()['id_usuario'];
/*$carrito = carritoTodos($db);*/
/*$product = leerProductosDelCarrito($db);*/

$product = leerProductosDelCarrito($db);
/*echo"<pre>";
print_r($product);
echo"</pre>";
exit;*/
?>
<section class="carritoCompras">
    <h2>Pedidos de los usuarios</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">ID_Usuario</th>
                <th class="text-center">ID_Pedido</th>
                <th class="text-center">Fecha</th>
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
                    <td class="text-center"><?=$carritos['id_usuario'];?></td>
                    <td class="text-center"><?=$carritos['id_pedido'];?></td>
                    <td class="text-center"><?=$carritos['fecha'];?></td>
                    <td class="text-center"><a href="acciones/finalizar-pedidos.php?id=<?=htmlspecialchars($carritos['id_pedido']);?>" class="text-danger"><i class="bi bi-trash text-danger"></i></a></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <p>Total de productos:  <?= count($product);?> </p>
        <p>Total Ingresos  $<?= $total;?> </p>

</section>
