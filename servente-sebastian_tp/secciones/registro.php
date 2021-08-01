<?php


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>
<section class="container sectionRegistro">
    <h2>Registrarse</h2>
    <p>Completa el formulario para poder estar registardo</p>

    <form action="acciones/registro.php" method="post" enctype="multipart/form-data" class="formRegistro">
        <fieldset >
            <legend>Datos de identificación</legend>
            <div class="form-file">
                <label for="email">Email</label>
                <input  type="email" id="email" name="email" class="form-control shadow" autocomplete="off" placeholder="ejemplo@ejemplo.com.ar"
                    <?php if(isset($errores['email'])) echo 'aria-describedby="error-email"';?>
                        value="<?= $oldData['email'] ?? '';?>">
                <?php
                if(isset($errores['email'])) : ?>
                    <div id="error-email" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['email'];?></div>
                <?php
                endif; ?>
            </div>
            <div class="form-file">
                <label for="password">Password</label>
                <!--<input type="password" id="password" name="password" class="form-control">-->

                <input  type="password" id="password" name="password" class="form-control shadow" autocomplete="off" placeholder="minimo 6 caracteres"
                    <?php if(isset($errores['password'])) echo 'aria-describedby="error-password"';?>
                        value="<?= $oldData['password'] ?? '';?>">
                <?php
                if(isset($errores['password'])) : ?>
                    <div id="error-password" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['password'];?></div>
                <?php
                endif; ?>



                <button type="button" title="Ver Password" class="form-pass-button" data-input="password"><i class="bi bi-eye text-light"></i></button>
            </div>
        </fieldset>
        <fieldset>
            <legend>Datos opcionales</legend>

            <div class="form-file">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-file">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control">
            </div>
            <div class="form-file">
                <label for="apodo">Apodo</label>
                <input type="text" id="apodo" name="apodo" class="form-control">
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
                        value="<?= $oldData['img-alt'] ?? '';?>">
            </div>
        </fieldset>
        <button class="btn btn-success botonRegistro">Registrarse</button>
    </form>

    <p class="parraRegistro">¿Ya tenes cuenta? <a href="index.php?s=login">inicia sesión</a></p>
</section>

<!--<script src="js/pass.js"></script>-->