<?php

require 'data/bootstrap.php';



// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);

// buscamos la noticia x id
if(empty($oldData)) {

    $usuarios = usuarioTraerPorId($db, $_GET['id']);
    $oldData = [
        'email' => $usuarios['email'],
        'password' => '',
        'nombre' => $usuarios['nombre'],
        'apellido' => $usuarios['apellido'],
        'apodo' => $usuarios['apodo'],
        'imgActual' => $usuarios['img'],
        'img_alt' => $usuarios['alt_img'],
    ];
}
/*echo "<pre>";
print_r($usuarios);
echo "</pre>";*/
//echo mysqli_error($db);
/*
echo "<pre>";
print_r(mysqli_error);
echo "</pre>";
*/

?>
<section id="editar-producto" class="container sectionRegistro">

    <h2 class="col-12">Editar Usuario</h2>

    <p>Completa el formulario</p>
    <form action="acciones/editar-usuario.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data" class="formRegistro">
        <!--<input type="hidden" name="imgActual" Value="<?/*= $oldData['imgActual'];*/?>">-->
        <div class="form-group">
            <div class="column">
                <label for="email" class="col-md-lg-2 col-form-label">Email</label>
                <input  type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="ejemplo@ejemplo.com.ar"
                        value="<?= $oldData['email'] ?? '';?>"
                        <?php if(isset($errores['email'])) echo 'aria-describedby="error-title"';?>>
                        <?php
                        if(isset($errores['email'])): ?>
                            <div id="error-title" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['email'];?></div>
                        <?php
                        endif; ?>
            </div>

            <div class="column">
                <label for="password" class="col-md-lg-2 col-form-label">Password</label>
                <input  type="text"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Minimo 6 caracteres"
                        value="<?= $oldData['password'] ?? '';?>"
                        <?php if(isset($errores['password'])) echo 'aria-describedby="error-intro"';?>>
                        <?php
                        if(isset($errores['password'])): ?>
                            <div id="error-intro" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['password'];?></div>
                        <?php
                        endif; ?>
            </div>

            <div class="column">
                <label for="nombre" class="col-md-lg-2 col-form-label">Nombre</label>
                <input  type="text"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        value="<?= $oldData['nombre'] ?? '';?>"
                        <?php if(isset($errores['nombre'])) echo 'aria-describedby="error-precio"';?>>
                        <?php
                        if(isset($errores['nombre'])): ?>
                            <div id="error-precio" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['nombre'];?></div>
                        <?php
                        endif; ?>
            </div>
            <div class="column">
                <label for="apellido" class="col-md-lg-2 col-form-label">apellido</label>
                <input  type="text"
                        class="form-control"
                        id="apellido"
                        name="apellido"
                        value="<?= $oldData['apellido'] ?? '';?>"
                        <?php if(isset($errores['apellido'])) echo 'aria-describedby="error-precio"';?>>
                        <?php
                        if(isset($errores['apellido'])): ?>
                            <div id="error-precio" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['apellido'];?></div>
                        <?php
                        endif; ?>
            </div>
            <div class="column">
                <label for="apodo" class="col-md-lg-2 col-form-label">apodo</label>
                <input  type="text"
                        class="form-control"
                        id="apodo"
                        name="apodo"
                        value="<?= $oldData['apodo'] ?? '';?>"
                        <?php if(isset($errores['apodo'])) echo 'aria-describedby="error-precio"';?>>
                        <?php
                        if(isset($errores['apodo'])): ?>
                            <div id="error-precio" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['apodo'];?></div>
                        <?php
                        endif; ?>
            </div>
            <div class="row d-flex justify-content-center">
                <p class="pt-3 text-warning font-weight-bold">Imagen Actual</p>
                <img src="imgs/<?= $oldData['imgActual'];?>" alt="Imagen Actual del Producto" class="w-25 rounded-circle">
            </div>
            <div class="column">
                <label for="img" class="col-md-lg-2 col-form-label">Imagen</label>
                <input  type="file"
                        class="form-control"
                        id="img"
                        name="img"
                >
            </div>
            <div class="column">
                <label for="img-alt" class="col-md-lg-2 col-form-label">Alt Imagen</label>
                <input  type="text"
                        class="form-control"
                        id="img-alt"
                        name="img-alt"
                        value="<?= $oldData['img_alt'] ?? '';?>">
            </div>
        <div class="text-center pt-3">
            <!--<input type="reset" value="limpiar" class="btn btn-warning">-->
            <input type="submit" value="enviar" class="btn btn-success col-12 mt-3">
        </div>
    </form>
    <h4 class="col-12">PROHIBIDA LA VENTA DE BEBIDAS ALCOHOLICAS A MENORES DE 18 AÑOS</h4>
</section>
