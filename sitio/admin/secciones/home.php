<?php
require '../libraries/productos.php';
$productos = getProducto($db);
?>
<section id="homes">
    <h2>Panel de Administracion  Tienda de Cervezas</h2>
    <picture class="figure w-100">
        <source media="(min-width: 61.25em)" srcset="imgs/playa-mobile-743.jpg">
        <source media="(min-width: 46.25em)" srcset="imgs/playa-mobile-742.jpg">
        <img src="imgs/playa-mobile-002.jpg" alt="foto" class="img-fluid figure-img">
    </picture>
    <div class="row row-cols-1 row-cols-md-2 carta-0">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center">Bienvenido al Panel de Tienda de Cervezas </h4>
                <p class="card-text text-center">Podes Ingresar , editar y eliminar Productos</p>
            </div>
        </div> 
    </div>
    <div class="row row-cols-1 row-cols-md-2 carta-3">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center">Bienvenido al Panel de Tienda de Cervezas </h4>
                <p class="card-text text-center">Podes Ingresar , editar y eliminar Productos</p>
            </div>
        </div> 
    </div>    
    <div class="row row-cols-1 row-cols-md-2 carta-1">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center"> Ingresar Producto </h4>
                <p class="card-text text-center">Ingresá a Nuestra Tienda de Cervezas para Ingresar Productos</p>
                <button class="btn btn-light shadow col-12" onclick="window.location='index.php?s=nuevo-producto'">Ingresar</button>
            </div>
        </div> 
    </div>  
    <div class="row row-cols-1 row-cols-md-2 carta-2">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center"> Editar Producto </h4>
                <p class="card-text text-center">Ingresá a Nuestra Tienda de Cervezas para Editar Productos</p>
                <button class="btn btn-light shadow col-12" onclick="window.location='index.php?s=editar-producto'">Ingresar</button>
            </div>
        </div>  
    </div> 
   
   

   
    
</section>


