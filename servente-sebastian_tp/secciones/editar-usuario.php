<?php

/*require 'libraries/usuarios.php';*/



// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);

// buscamos la noticia x id
if(empty($oldData)) {
    $usuarios = usuarioBuscaPorEmail($db, $_GET['id_usuario']);

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

    <h2 class="col-12">Editar Usuario</h2>

    <p>Completa el formulario</p>
    <form action="acciones/editar-usuario.php?id=<?= $_GET['id_usuario'];?>" method="post" enctype="multipart/form-data" class="formRegistro">
        <!--<input type="hidden" name="imgActual" Value="<?/*= $oldData['imgActual'];*/?>">-->
        <div class="form-group col-12">
            <div class="col-md-12  ">
                <label for="email" class="col-md-lg-2 col-form-label">Email</label>
                <input  type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        value="<?= $oldData['email'] ?? '';?>"
                    <?php if(isset($errores['email'])) echo 'aria-describedby="error-title"';?>>
                <?php
                if(isset($errores['email'])): ?>
                    <div id="error-title" class="msj-error pl-4"><?= $errores['email'];?></div>
                <?php
                endif; ?>
            </div>

            <div class="col-md-12 column">
                <label for="password" class="col-md-lg-2 col-form-label">Password</label>
                <input  type="text"
                        class="form-control"
                        id="password"
                        name="password"
                        value="<?= $oldData['password'] ?? '';?>"
                    <?php if(isset($errores['password'])) echo 'aria-describedby="error-intro"';?>>
                <?php
                if(isset($errores['password'])): ?>
                    <div id="error-intro" class="msj-error pl-4"><?= $errores['password'];?></div>
                <?php
                endif; ?>
            </div>

            <div class="col-md-12 column">
                <label for="nombre" class="col-md-lg-2 col-form-label">Nombre</label>
                <input  type="text"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        value="<?= $oldData['nombre'] ?? '';?>">
            </div>
            <div class="col-md-12 column">
                <label for="apellido" class="col-md-lg-2 col-form-label">apellido</label>
                <input  type="text"
                        class="form-control"
                        id="apellido"
                        name="apellido"
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
