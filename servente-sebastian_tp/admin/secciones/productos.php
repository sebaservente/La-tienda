<?php
require '../libraries/productos.php';
// parametros de busqueda
$b = $_GET['b'] ?? null;

// datos de la paginacion
$pagCantidad = 6;

// numero de pagina con el casteo
$pagina = (int) ($_GET['p'] ?? 1);

// calculamos el inicio
$pagRegistroInicial = ($pagCantidad * $pagina) - $pagCantidad;

// parametros de busqueda
$productos = getProducto($db, [
    'b' => $b
], $pagCantidad, $pagRegistroInicial);

// pedimos la cantidad total de registros
$pagCantidadTotalRegistro = getProductosCantidadDeRegistro($db, [
    'b' => $b
]);

// calculamos el total de las piginas
// con ceil() redondea para arriba
$pagTotal = ceil($pagCantidadTotalRegistro / $pagCantidad);


?>
<section id="productos" class="container-fluid producto">
   
    <h2>Productos</h2>
    <p>Administra tus Productos desde Aqui</p>
    <p>Para Ingresar Productos <a href="index.php?s=nuevo-producto" class="text-success">Click Aca</a></p>
    <div class="divs">    
        <?php
        foreach ($productos as $producto): 
        ?>      
        <article class="articleProducto">
                <div class="divInfoProducto">
                    <a href="#" class="text-dark" >
                        <h3>Id:  <?=$producto['id_cerveza'];?></h3>
                        <figure>
                            <img src="../imgs/<?= $producto['img'];?>" class="img-fluid  figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                        </figure>
                        <div class="divDatosProducto">
                            <p><?= htmlspecialchars($producto['title']);?></p>
                            <p> <?= htmlspecialchars($producto['intro']);?></p>
                            <p> <?= htmlspecialchars($producto['definicion']);?></p>
                            <p class="ch5">Precio: <?= htmlspecialchars($producto['precio']);?></p>
                        </div>
                        <p class="m-1 p-2  m-auto text-center w-75">
                            <a href="index.php?s=editar-producto&id=<?=$producto['id_cerveza'];?>" class="text-warning">Editar /</a>
                            <a href="acciones/producto-eliminar.php?id=<?=$producto['id_cerveza'];?>" class="borrar text-danger">Eliminar</a>
                        </p>
                    </a>
                </div>

        </article>  
        <?php
        endforeach;
        ?>
    </div>      
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
    <?php
    if($pagTotal > 1):
        ?>
        <div class="paginador">
            <p>Paguinas</p>
            <ul class="paginador-lista">
                <?php if($pagina > 1): ?>
                    <li><a href="index.php?s=productos&p=1&b=<?= $b;?>">Primera</a></li>
                    <li><a href="index.php?s=productos&p=<?=($pagina - 1);?>&b=<?= $b;?>"> <<< </a></li>
                <?php
                else: ?>
                    <!-- <li>Inicio</li>-->
                    <li> <<< </li>
                <?php
                endif; ?>
                <?php
                for($i = 1; $i <= $pagTotal; $i++):
                    ?>
                    <?php
                    if($i != $pagina):
                        ?>
                        <li><a href="index.php?s=productos&p=<?= $i;?>&b=<?= $b;?>"><?= $i;?></a></li>
                    <?php
                    else:
                        ?>
                        <li class="bg-warning"><b><?= $i;?></b></li>
                    <?php
                    endif;
                endfor;?>
                <?php if($pagina < $pagTotal): ?>
                    <li><a href="index.php?s=productos&p=<?=($pagina + 1);?>&b=<?= $b;?>"> >>> </a></li>
                    <li><a href="index.php?s=productos&p=<?= $pagTotal;?>&b=<?= $b;?>">Ultima</a></li>
                <?php
                else: ?>
                    <!-- <li>Final</li>-->
                    <li> >>> </li>
                <?php
                endif; ?>
            </ul>
        </div>
    <?php
    endif; ?>
</section>

<script>
    window.addEventListener('DOMContentLoaded', function(){
        const linksEliminar = document.querySelectorAll('.borrar');
        linksEliminar.forEach(function(aElem) {
            aElem.addEventListener('click', function(ev){
                if(!confirm('estas seguro de eliminar el producto')){
                    ev.preventDefault();
                }
            });
        }); 
    });
</script>