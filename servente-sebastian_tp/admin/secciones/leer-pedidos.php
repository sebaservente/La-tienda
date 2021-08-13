<?php
require '../data/bootstrap.php';
require '../libraries/carrito.php';
require '../libraries/productos.php';

$idUsuario = authObtenerUsuario()['id_usuario'];
/*$carrito = carritoTodos($db);*/
$product = leerProductosDelCarrito($db);

/*echo"<pre>";
print_r($product);
echo"</pre>";
exit;*/
?>
<section class="carritoCompras">
    <h2>Pedidos de los usuarios</h2>
<!--    --><?php
/*    if(count($product) > 0) :*/?>
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
                    <td><?=$carritos['id_pedido'];?></td>
                    <td><?=$carritos['email'];?></td>
                    <td><?=$carritos['title'];?></td>
                    <td><?=$carritos['precio'];?></td>
                    <td><?=$carritos['apodo'];?></td>
                    <td><a href="acciones/carrito/finalizar-pedidos.php?id=<?=htmlspecialchars($carritos['id_pedido']);?>" class="text-danger">eliminar</a></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <p>Total de productos:  <?= count($product);?> </p>
        <p>Total Ingresos  $<?= $total;?> </p>
   <!-- <?php
/*    else:*/?>
        <p>Todavia no tenes a ninguna cerveza en tu carrito, no esperes mas. ¡Podes empezar ya mismo a <a href="index.php?s=productos">elegir cervezas</a> y armar tu pedido!</p>
    --><?php
/*    endif;*/?>



    <?php
    /*    $total = 0;
        foreach ($product as $carritos):
                $total += $carritos['precio'];
            */?><!--
        <div class="carritoProductos">
            <p class="pr-3"><?/*=$carritos['title'];*/?></p>
            <p class="pr-3"><?/*=$carritos['precio'];*/?></p>
            <div class="divImagen">
                <figure>
                    <img src="imgs/<?/*= $carritos['img'];*/?>" class="img-fluid w-25 figure-img" alt="<?/*= htmlspecialchars($carritos['alt_img']);*/?>">
                </figure>
            </div>
            <p><a href="#" class="text-danger">eliminar</a></p>
        </div>
    --><?php
    /*    endforeach;
        */?>

</section>
