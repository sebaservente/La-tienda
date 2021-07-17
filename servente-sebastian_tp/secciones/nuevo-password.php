<?php


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>
<section class="sectionRegistro">
    <h2>Restablecer contraseña</h2>
    <p>Escribi tu nueva contraseña en el formulario</p>
    <form action="acciones/establecer-password.php" method="post" class="p-3 m-auto formRegistro">
        <input type="hidden" name="token" value="<?= $_GET['token'];?>">
        <input type="hidden" name="email" value="<?= $_GET['email'];?>">
        <div class="form-file">
            <label for="password">Nueva Contraseña</label>
            <input  type="password" id="password" name="password" class="form-control shadow" autocomplete="off" placeholder="minimo 6 caracteres"
                <?php if(isset($errores['password'])) echo 'aria-describedby="error-password"';?>
                    value="<?= $oldData['password'] ?? '';?>">
            <?php
            if(isset($errores['password'])) : ?>
                <div id="error-password" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['password'];?></div>
            <?php
            endif; ?>
            <div class="text-center">
                <button class="btn btn-success botonRegistro">Restablecer Contraseña</button>
            </div>
        </div>
    </form>
</section>
