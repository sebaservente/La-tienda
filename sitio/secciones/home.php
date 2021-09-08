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
            <p class="cards__pfo"><a href="index.php?s=productos" class="text-light">LAS MEJORES MARCAS</a> </p>
        </div>
       <div class="cards__contener">
           <div class="cards__imgs"></div>
           <p class="cards__pfo">DESCUENTOS IMPERDIBLES</p>
       </div>
    </div>
    <!--<div class="horizontal-scroll-wrapper squares">
        <div>item 1</div>
        <div>item 2</div>
        <div>item 3</div>
        <div>item 4</div>
        <div>item 5</div>
        <div>item 6</div>
        <div>item 7</div>
        <div>item 8</div>
    </div>-->
    <h5 class="text-center">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h5>

</section>


