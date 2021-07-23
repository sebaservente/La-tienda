<?php

require 'libraries/usuarios.php';



// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);

// buscamos la noticia x id
if(empty($oldData)) {
    $usuarios = productosporid($db, $_GET['id']);
   /* $productosTags = explode(' | ', $usuarios['tags']);*/

    /*$tagsId = [];*/

    // foreach para generar id de los tags
    /*foreach ($productosTags as $tag) {
        $dataTag = explode(' => ',  $tag);
        $tagsId[] = $dataTag[0];
    }*/

    $oldData = [
        'email' => $usuarios['email'],
        'password' => $usuarios['password'],
        'nombre' => $usuarios['nombre'],
        'apellido' => $usuarios['apellido'],
    ];
}
//echo mysqli_error($db);
/*
echo "<pre>";
print_r(mysqli_error);
echo "</pre>";
*/

?>
<section id="editar-producto" class="container sectionRegistro">

    <h2 class="col-12">Editar productos</h2>

    <p>Completa el formulario</p>
    <form action="acciones/editar-usuario.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data" class="formRegistro">
        <!--<input type="hidden" name="imgActual" Value="<?/*= $oldData['imgActual'];*/?>">-->
        <div class="form-group col-12">
            <div class="col-md-12  ">
                <label for="title" class="col-md-lg-2 col-form-label">Email</label>
                <input  type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="<?= $oldData['email'] ?? '';?>"
                    <?php if(isset($errores['email'])) echo 'aria-describedby="error-title"';?>>
                <?php
                if(isset($errores['email'])): ?>
                    <div id="error-title" class="msj-error pl-4"><?= $errores['email'];?></div>
                <?php
                endif; ?>
            </div>

            <div class="col-md-12 column">
                <label for="intro" class="col-md-lg-2 col-form-label">Password</label>
                <input  type="text"
                        class="form-control"
                        id="intro"
                        name="intro"
                        value="<?= $oldData['password'] ?? '';?>"
                    <?php if(isset($errores['password'])) echo 'aria-describedby="error-intro"';?>>
                <?php
                if(isset($errores['password'])): ?>
                    <div id="error-intro" class="msj-error pl-4"><?= $errores['password'];?></div>
                <?php
                endif; ?>
            </div>

            <div class="col-md-12 column">
                <label for="definicion" class="col-md-lg-2 col-form-label">Nombre</label>
                <input  type="text"
                        class="form-control"
                        id="definicion"
                        name="definicion"
                        value="<?= $oldData['nombre'] ?? '';?>">
            </div>
            <div class="col-md-12 column">
                <label for="precio" class="col-md-lg-2 col-form-label">apellido</label>
                <input  type="number"
                        class="form-control"
                        id="precio"
                        name="precio"
                        value="<?= $oldData['apellido'] ?? '';?>"
                    <?php if(isset($errores['apellido'])) echo 'aria-describedby="error-precio"';?>>
                <?php
                if(isset($errores['apellido'])): ?>
                    <div id="error-precio" class="msj-error pl-4"><?= $errores['apellido'];?></div>
                <?php
                endif; ?>
            </div>

        <div class="col-12 text-center">
            <!--<input type="reset" value="limpiar" class="btn btn-warning">-->
            <input type="submit" value="enviar" class="btn btn-success col-xl-6">
        </div>
    </form>
    <h4 class="col-12 ">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
</section>
