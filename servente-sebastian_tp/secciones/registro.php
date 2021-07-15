<?php


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>
<section class="container sectionRegistro">
    <h2>Registrarse</h2>
    <p>Completa el formulario para poder estar registardo</p>

    <form action="acciones/registro.php" method="post" class="formRegistro">
        <fieldset >
            <legend>Datos de identificación</legend>
            <div class="form-file">
                <label for="email">Email</label>
                <input  type="email" id="email" name="email" class="form-control shadow" autocomplete="off"
                    <?php if(isset($errores['email'])) echo 'aria-describedby="error-email"';?>
                        value="<?= $oldData['email'] ?? '';?>">
                <?php
                if(isset($errores['email'])) : ?>
                    <div id="error-email" class="msj-error pl-4 bg-warning"><?= $errores['email'];?></div>
                <?php
                endif; ?>
            </div>
            <div class="form-file">
                <label for="password">Password</label>
                <!--<input type="password" id="password" name="password" class="form-control">-->

                <input  type="password" id="password" name="password" class="form-control shadow" autocomplete="off"
                    <?php if(isset($errores['password'])) echo 'aria-describedby="error-password"';?>
                        value="<?= $oldData['password'] ?? '';?>">
                <?php
                if(isset($errores['password'])) : ?>
                    <div id="error-password" class="msj-error pl-4 bg-warning"><?= $errores['password'];?></div>
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
        </fieldset>
        <button class="btn btn-success botonRegistro">Registrarse</button>
    </form>

    <p class="parraRegistro">¿Ya tenes cuenta? <a href="index.php?s=login">inicia sesión</a></p>
</section>

<!--<script src="js/pass.js"></script>-->