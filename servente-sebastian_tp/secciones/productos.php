<?php
require 'libraries/productos.php';

// parametros de busqueda
$b = $_GET['b'] ?? null;

// datos de la paginacion
$pagCantidad = 4;
$pagina = $_GET['p'] ?? 1;
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
   
    <h2 class="col-12 text-center">Elige Tu Estilo</h2>
    <div>
        <h3>Busca la cerveza que más te identifique</h3>
        <form action="index.php" method="get" class="formRegistroBuscar">
            <input type="hidden" name="s" value="productos">
            <div class="form-file">
                <label for="b">Buscar</label>
                <input type="search" id="b" name="b" class="form-control" value="<?= $b;?>">
            </div>
            <button class="btn btn-success botonRegistroBuscar"><i class="bi bi-search"> Buscar</i></button>
        </form>
    </div>
    <p class="parrafoResultados">Mostrando <?= $pagCantidad;?> resulatdos de un total de <?= $pagCantidadTotalRegistro;?> </p>
    <div class="divs">
        <?php
        foreach ($productos as $producto):
            $tags = !empty($producto['tags']) ? explode(' | ', $producto['tags']) : [];
        ?>
       
        <article>       
                <div class="bg-light">
                    <a href="index.php?s=leer-producto&id=<?= $producto['id_cerveza'];?>" class="text-dark" >
                        <h3><?= htmlspecialchars($producto['title']);?></h3>
                        <div class="productos_tags">
                            <?php
                            foreach ($tags as $tag):
                                $dataTags = explode(' => ', $tag);
                            ?>
                            <span class="productos_item_tags"><?= htmlspecialchars($dataTags[1]) ;?></span>
                            <?php
                            endforeach; ?>
                        </div>
                        <p><?= htmlspecialchars($producto['intro']);?></p>
                        <p><?= htmlspecialchars($producto['definicion']);?></p>
                    </a>    
                    <button class="text-dark" >Comprar </button>     
                </div>
                <figure>                      
                    <img src="imgs/<?= $producto['img'];?>" class="img-fluid w-100 figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                </figure>
                <p class="ch5">Precio: <?= htmlspecialchars($producto['precio']);?></p> 
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
            <p class="text-center">Paguinas</p>
            <ul class="paginador-lista">
                <?php
                for($i = 1; $i <= $pagTotal; $i++): ?>
                    <li><a href="index.php?s=productos&p=<?= $i;?>"><?= $i;?></a></li>
                <?php
                endfor;?>

            </ul>
        </div>
    <?php
    endif; ?>

</section>