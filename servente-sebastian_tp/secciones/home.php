<?php
require 'libraries/productos.php';
$productos = getProducto($db);
?>
<section id="homes">
    <h2> La Tienda </h2>
    <p class="parrafoInicio">Mas de 500 etiquetas nacionales e importadas</p>
    <picture class="figure w-100">
        <source media="(min-width: 30.05em)" srcset="imgs/playa-mobile-743.jpg">
        <source media="(min-width: 25.05em)" srcset="imgs/vasoCervezaInicio.jpg">
        <source media="(min-width: 14.25em)" srcset="imgs/vasoCervezaInicio.jpg">
        <img src="imgs/playa-mobile-002.jpg" alt="foto" class="img-fluid figure-img">
    </picture>
    <div class="card card-body">
        <h4 class="card-title text-center"> La Tienda </h4>

        <p class="card-text text-center">Gran variedad de cerveza, novedosas y de calidad. Conocé nuestros Combos y Comprá Online! ¿Querés conocer nuestra Variedad
            de Cervezas? Ingresá y encontrá los Packs Destacados. La Revolución de la Cerveza. En La Tienda nos esforzamos para  buscar y seleccionar gran variedad de cervezas,
            novedosas, diferentes y de calidad. Las embarrilamos y enlatamos con mucha pasión, amor y arte. Si querés buena
            cerveza para tu negocio, escribinos. La Tienda Donde podés ENCONTRAR tus cervezas favoritas y todo para disfrutar de un Momento Único.</p>
    </div>

  <!-- <div class="row row-cols-1 row-cols-md-2 carta-1">
        <div class="col-12">
            <div class="card card-body">
                
                <h4 class="card-title text-center"> Nuestra Tienda</h4>
                <p class="card-text text-center">Ingresá a Nuestra Tienda de Cervezas y elegí la que más te guste, tenemos Muchas 
                    variedades en marcas Nacionales e Importadas</p>
                    <button class="btn btn-light shadow col-12" onclick="window.location='index.php?s=productos'">Ingresar</button>
                <button type="button" class="btn btn-light shadow"><a class="nav-link text-dark" href="index.php?s=productos">Ingresar</a></button>
            </div>
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
    </div>-->
    <div class="carru">
        <div id="carouselExampleIndicators" class="carousel slide carruPrimero" data-ride="carousel">
            <div class="text-center m-2">
                <h3>Nuestros productos</h3>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imgs/india-pale.jpg" alt="botella de cerveza india-pale">
                    <p class="text-center m-2">Cerveza India Pale</p>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/blonde-pale.jpg" alt="botella de cerveza blonde-pale">
                    <p class="text-center m-2">Cerveza Blonde Pale</p>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/apa-0001.jpg" alt="botella de cerveza apa">
                    <p class="text-center m-2">Cerveza Apa</p>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="carouselExampleIndicatorss" class="carousel slide carruSegundo" data-ride="carousel">
            <div class="text-center m-2">
                <h3>Descuentos</h3>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicatorss" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicatorss" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicatorss" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imgs/india-pale.jpg" alt="botella de cerveza india-pale">
                    <p class="text-center m-2">Cerveza India Pale</p>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/blonde-pale.jpg" alt="botella de cerveza blonde-pale">
                    <p class="text-center m-2">Cerveza Blonde Pale</p>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/apa-0001.jpg" alt="botella de cerveza apa">
                    <p class="text-center m-2">Cerveza Apa</p>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicatorss" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicatorss" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="card card-body carruTercero">
            <div class="card card-body">
                <h4 class="card-title text-center"> Ingresar</h4>
                <p class="card-text text-center">Elegí la cerveza que más te guste, tenemos Muchas
                    variedades en marcas Nacionales e Importadas</p>
                <button class="btn btn-info shadow" onclick="window.location='index.php?s=login'">Ingresar</button>
            </div>
            <div class="card card-body">
                <h4 class="card-title text-center"> Regístrate </h4>
                <p class="card-text text-center">Se parte de La Tienda y Recibiras incleibles Descuentos.
                    Participar De Nuestros Cursos  sobre Cervezas Artesanales</p>
                <button class="btn btn-info shadow " onclick="window.location='index.php?s=registro'">Registrate</button>
            </div>
        </div>
    </div>
</section>


