<?php
require 'libraries/productos.php';
$productos = getProducto($db);
?>
<section id="homes">
    <h2> La Tienda </h2>
    <div class="divParrafosInicio position-absolute">
        <p class="parrafoInicio">Mas de 500 etiquetas</p>
        <p class="parrafoInicios">nacionales e importadas.</p>
    </div>
    <button class="btnInicios btn btn-light text-dark" onclick="window.location='index.php?s=productos'">Ingresar</button>
    <picture class="figure w-100">
        <source media="(min-width: 30.05em)" srcset="imgs/vasoCerveza-Grande.jpg">
        <source media="(min-width: 25.05em)" srcset="imgs/vasoCervezaInicio.jpg">
        <source media="(min-width: 14.25em)" srcset="imgs/vasoCervezaInicio.jpg">
        <img src="imgs/vaso-Cerveza-Inicio-Original.jpg" alt="vaso de cerveza" class="img-fluid figure-img">
    </picture>
    <div class="anuncio">
        <div class="anuncio__mjs">
            <p class="anuncio__pfo w-25 text-center"><i class="bi bi-credit-card text-info border rounded-circle p-2"></i>12 Pagos sin interes</p>
            <p class="anuncio__pfo w-25 text-center"><i class="bi bi-credit-card text-info border rounded-circle p-2 ml-2 mr-2"></i>Tarjeta de debito</p>
            <p class="anuncio__pfo w-25 text-center"><i class="bi bi-currency-dollar text-info border rounded-circle p-2 ml-2 mr-2"></i>Efectivo</p>
            <p class="anuncio__pfo w-25 text-center"><i class="bi bi-truck text-info border rounded-circle p-2 ml-2 mr-2"></i>Envios</p>
        </div>
    </div>
    <div class="cards">
        <div class="cards__contener">
            <div class="cards__img"></div>
            <p class="cards__pfo">LAS MEJORES MARCAS</p>
        </div>
       <div class="cards__contener">
           <div class="cards__imgs"></div>
           <p class="cards__pfo">DESCUENTOS IMPERDIBLES</p>
       </div>
    </div>

    <!--<div class="divPresentacion">
        <div class="divPresent mt-4 mb-4 ">
            <h3 class="text-center"> Nosostros </h3>
            <p>Gran variedad de cerveza, novedosas y de calidad. Conocé nuestros Combos y Comprá Online! ¿Querés conocer nuestra Variedad
                de Cervezas? Ingresá y encontrá los Packs Destacados. La Revolución de la Cerveza. En La Tienda nos esforzamos para  buscar y seleccionar gran variedad de cervezas,
                novedosas, diferentes y de calidad. Las embarrilamos y enlatamos con mucha pasión, amor y arte. Si querés buena
                cerveza para tu negocio, escribinos. La Tienda Donde podés ENCONTRAR tus cervezas favoritas y todo para disfrutar de un Momento Único.
            </p>
        </div>
        <div class="carru">
            <div id="carouselExampleIndicators" class="carousel slide carruPrimero" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/india-pale.jpg" alt="botella de cerveza india-pale">
                        <p class="text-center m-2">Cerveza India Pale</p>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/blonde-pale.jpg" alt="botella de cerveza blonde-pale">
                        <p class="text-center m-2">Cerveza Blonde Pale</p>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/apa-0001.jpg" alt="botella de cerveza apa">
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
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorss" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorss" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorss" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/india-pale.jpg" alt="botella de cerveza india-pale">
                        <p class="text-center m-2">Cerveza India Pale</p>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/blonde-pale.jpg" alt="botella de cerveza blonde-pale">
                        <p class="text-center m-2">Cerveza Blonde Pale</p>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-75 m-auto rounded-circle" src="imgs/apa-0001.jpg" alt="botella de cerveza apa">
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
        </div>
        <div class="card card-body carruTercero">
            <div class="card card-body m-3">
                <h4 class="card-title text-center"> Conoce nuestros productos</h4>
                <p class="card-text text-center">Elegí la cerveza que más te guste, tenemos Muchas
                    variedades en marcas Nacionales e Importadas</p>
                <button class="btn btn-info shadow m-auto w-50" onclick="window.location='index.php?s=login'">Ingresar</button>
            </div>
            <div class="card card-body m-3">
                <h4 class="card-title text-center"> Las mejores ofertas </h4>
                <p class="card-text text-center">Se parte de La Tienda y Recibiras incleibles Descuentos.
                    Participar De Nuestros Cursos  sobre Cervezas Artesanales</p>
                <button class="btn btn-info shadow m-auto w-50" onclick="window.location='index.php?s=registro'">Registrate</button>
            </div>
        </div>
    </div>-->
    <h5 class="text-center">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h5>

</section>


