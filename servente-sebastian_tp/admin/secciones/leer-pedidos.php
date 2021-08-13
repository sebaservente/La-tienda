<?php
require '../data/bootstrap.php';
require '../libraries/carrito.php';
require '../libraries/productos.php';

$idUsuario = authObtenerUsuario()['id_usuario'];
/*$carrito = carritoTodos($db);*/
/*$product = leerProductosDelCarrito($db);*/

$product = traerProductosDelCarrito($db, $idUsuario);
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
                <th>ID_Pedido</th>
                <th>Email</th>
                <th>title</th>
                <th>Precio</th>
                <th>Apodo</th>
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
                    <td><?=$carritos['id_cerveza'];?></td>
                    <td><?=$carritos['email'];?></td>
                    <td><?=$carritos['title'];?></td>
                    <td><?=$carritos['precio'];?></td>
                    <td><?=$carritos['apodo'];?></td>
                   <!-- <td><a href="acciones/carrito/finalizar-pedidos.php?id=<?/*=htmlspecialchars($carritos['id_cerveza']);*/?>" class="text-danger">eliminar</a></td>-->
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <p>Total de productos:  <?= count($product);?> </p>
        <p>Total Ingresos  $<?= $total;?> </p>

</section>
