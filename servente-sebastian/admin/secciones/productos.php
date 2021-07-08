<?php
require '../libraries/productos.php';
$productos = getProducto($db);
?>
<section id="productos" class="container-fluid producto">
   
    <h2 class="col-12">Productos</h2>
    <p>Administra tus Productos desde Aqui</p>
    <p>Para Ingresar Productos <a href="index.php?s=nuevo-producto" class="text-success">Click Aca</a></p>
    <div class="divs">    
        <?php
        foreach ($productos as $producto): 
        ?>      
        <article>       
                <div class="bg-light">
                        <h3>Id:  <?=$producto['id_cerveza'];?></h3>
                        <p><?= htmlspecialchars($producto['title']);?></p>
                        <p> <?= htmlspecialchars($producto['intro']);?></p>
                        <p> <?= htmlspecialchars($producto['definicion']);?></p> 
                        <p class="ch5">Precio: <?= htmlspecialchars($producto['precio']);?></p>  
                        <p class="p-2 border border-dark bg-dark">
                            <a href="index.php?s=editar-producto&id=<?=$producto['id_cerveza'];?>" class="text-warning">Editar /</a>
                            <a href="acciones/producto-eliminar.php?id=<?=$producto['id_cerveza'];?>" class="borrar text-danger">Eliminar</a>
                        </p>     
                </div>
                <figure>                      
                    <img src="../imgs/<?= $producto['img'];?>" class="img-fluid  figure-img" alt="<?= htmlspecialchars($producto['alt_img']);?>">
                </figure>            
        </article>  
        <?php
        endforeach;
        ?>
    </div>      
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
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