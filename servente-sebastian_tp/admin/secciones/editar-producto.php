<?php

require '../libraries/productos.php';
require '../libraries/tags.php';

// traemos los tags
$tags = tagsTodos($db);

// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);

// buscamos la noticia x id 
if(empty($oldData)) {
    $producto = productosporid($db, $_GET['id']);

    echo $producto['tags'];

    $oldData = [
        'title' => $producto['title'],
        'intro' => $producto['intro'],
        'text' => $producto['text'],
        'definicion' => $producto['definicion'],
        'precio' => $producto['precio'],
        'imgActual' => $producto['img'],
        'img_alt' => $producto['alt_img'],
        
    ];
}    
//echo mysqli_error($db);
/*
echo "<pre>";
print_r(mysqli_error);
echo "</pre>";
*/

?>
<section id="editar-producto" class="container-fluid producto-nuevo">
   
        <h2 class="col-12">Editar productos</h2>
        
        <p>Completa el formulario</p>
        <form action="acciones/producto-editar.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data">		
            <input type="hidden" name="imgActual" Value="<?= $oldData['imgActual'];?>">					   
            <div class="form-group col-12">
                <div class="col-md-12  ">
                    <label for="title" class="col-md-lg-2 col-form-label">Titulo</label>
                    <input  type="text" 
                            class="form-control" 
                            id="title" 
                            name="title"  
                            value="<?= $oldData['title'] ?? '';?>"
                            <?php if(isset($errores['title'])) echo 'aria-describedby="error-title"';?>>
                            <?php 
                            if(isset($errores['title'])): ?>
                            <div id="error-title" class="msj-error pl-4"><?= $errores['title'];?></div>
                            <?php 
                            endif; ?>
                </div>
            
                <div class="col-md-12 column">
                    <label for="intro" class="col-md-lg-2 col-form-label">Intro</label>
                    <input  type="text" 
                            class="form-control" 
                            id="intro"  
                            name="intro"
                            value="<?= $oldData['intro'] ?? '';?>"
                            <?php if(isset($errores['intro'])) echo 'aria-describedby="error-intro"';?>>
                            <?php 
                            if(isset($errores['intro'])): ?>
                            <div id="error-intro" class="msj-error pl-4"><?= $errores['intro'];?></div>
                            <?php 
                            endif; ?>
                </div>
                    
                <div class="col-md-12 column">
                    <label for="definicion" class="col-md-lg-2 col-form-label">Definicion</label>
                    <input  type="text" 
                            class="form-control" 
                            id="definicion"  
                            name="definicion"  
                            value="<?= $oldData['definicion'] ?? '';?>">
                </div>
                <div class="col-md-12 column">
                    <label for="text" class="col-md-lg-2 col-form-label">Texto</label>
                    <textarea class="form-control" id="text" name="text"><?= $oldData['text'] ?? '';?></textarea>
                </div>
                <div class="col-md-12 column">
                    <label for="precio" class="col-md-lg-2 col-form-label">Precio</label>
                    <input  type="number" 
                            class="form-control" 
                            id="precio"  
                            name="precio"  
                            value="<?= $oldData['precio'] ?? '';?>"
                            <?php if(isset($errores['precio'])) echo 'aria-describedby="error-precio"';?>>
                            <?php 
                            if(isset($errores['precio'])): ?>
                            <div id="error-precio" class="msj-error pl-4"><?= $errores['precio'];?></div>
                            <?php 
                            endif; ?>
                </div>
                <div>
                    <p>Imagen Actual</p>
                    <img src="../imgs/<?= $oldData['imgActual'];?>" alt="Imagen Actual del Producto" class="w-25">
                </div>
                <div class="col-md-12 column">
                    <p id="img-cambiar">Elije una imagen si queres actualizarla</p> 
                    <label for="img" class="col-md-lg-2 col-form-label"  aria-describedby="img-cambiar">Nueva Imagen</label>
                    <input  type="file" 
                            class="form-control" 
                            id="img"  
                            name="img"  
                            >
                          
                </div>
                <div class="col-md-12 column">
                    <label for="img-alt" class="col-md-lg-2 col-form-label">Alt Imagen</label>
                    <input  type="text" 
                            class="form-control" 
                            id="img-alt"  
                            name="img-alt"  
                            value="<?= $oldData['img_alt'] ?? '';?>">
                </div>
            </div>
            <fieldset>
                <?php
                foreach($tags as $tag): ?>
                    <label for=""><input type="checkbox" name="tags[]" value="<?= $tag['id_tags'] ;?>"<?php
                        if (isset($oldData['tags']) && in_array($tag['id_tags'], $oldData['tags'])) {
                            echo "checked";
                        }
                        ?>><?= $tag['nombre'];?></label>
                <?php
                endforeach;?>
                <legend>Etiqueta / Tags</legend>

            </fieldset>
            <div class="col-12 text-center">
                <!--<input type="reset" value="limpiar" class="btn btn-warning">-->
                <input type="submit" value="enviar" class="btn btn-success col-xl-6">
            </div>
        </form>
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
</section>