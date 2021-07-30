<?php
require 'libraries/productos.php';
$productos = getProducto($db);
?>
<section id="homes">
    <h2> La Tienda </h2>
    <picture class="figure w-100">
        <source media="(min-width: 61.25em)" srcset="imgs/playa-mobile-743.jpg">
        <source media="(min-width: 46.25em)" srcset="imgs/playa-mobile-742.jpg">
        <img src="imgs/playa-mobile-002.jpg" alt="foto" class="img-fluid figure-img">
    </picture>
   <!-- <div class="row row-cols-1 row-cols-md-2 carta-0">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center"> La Tienda </h4>
                <p class="card-text text-center">Gran variedad de cerveza, novedosas y de calidad. Conocé nuestros Combos y Comprá Online! ¿Querés conocer nuestra Variedad
                    de Cervezas? Ingresá y encontrá los Packs Destacados. La Revolución de la Birra. En La Tienda nos esforzamos para  buscar y seleccionar gran variedad de birras,
                    novedosas, diferentes y de calidad. Las embarrilamos y enlatamos con mucha pasión, amor y arte. Si querés buena 
                    birra para tu negocio, escribinos. Tienda De cervezas Donde podés ENCONTRAR tus cervezas favoritas y todo para disfrutar de un Momento Único.</p>
            </div>
        </div> 
    </div>  -->
    <!--<div class="row row-cols-1 row-cols-md-2 carta-1">
        <div class="col-12">
            <div class="card card-body">
                
                <h4 class="card-title text-center"> Nuestra Tienda</h4>
                <p class="card-text text-center">Ingresá a Nuestra Tienda de Cervezas y elegí la que más te guste, tenemos Muchas 
                    variedades en marcas Nacionales e Importadas</p>
                    <button class="btn btn-light shadow col-12" onclick="window.location='index.php?s=productos'">Ingresar</button>-->
                <!--<button type="button" class="btn btn-light shadow"><a class="nav-link text-dark" href="index.php?s=productos">Ingresar</a></button>-->
        <!--    </div>
        </div> 
    </div>  
    <div class="row row-cols-1 row-cols-md-2 carta-2">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center"> Regístrate </h4>
                <p class="card-text text-center">Se parte de La Tienda y Recibiras incleibles Descuentos.
                     Participar De Nuestros Cursos  sobre Cervezas Artesanales</p>
                     <button class="btn btn-light shadow col-12" onclick="window.location='index.php?s=registro'">Registrate</button>
            </div>
        </div>  
    </div>  -->

   
    
</section>


