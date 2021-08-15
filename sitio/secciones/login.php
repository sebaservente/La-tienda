<?php


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>

<section id="loginIndex" class="sectionRegistro">
    <h2>Iniciar Sesión</h2>
    <p class="primerParrafo">Ingresa tus credenciales</p>
    <form action="acciones/login.php" method="post" class="formRegistro">

        <div class="form-group">
            <label for="email">Email</label>
            <input  type="email" id="email" name="email" class="form-control shadow" autocomplete="off"
                <?php if(isset($errores['email'])) echo 'aria-describedby="error-email"';?>
                    value="<?= $oldData['email'] ?? '';?>">
            <?php
            if(isset($errores['email'])) : ?>
                <div id="error-email" class="msj-error mt-2 pl-4 bg-warning"><i class="bi bi-backspace-reverse p-1"></i><?= $errores['email'];?></div>
            <?php
            endif; ?>

        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input  type="password" id="password" name="password" class="form-control shadow" >
        </div>
        <div class="text-center">
            <button class="btn btn-success botonRegistro">Ingresar</button>
        </div>
        <!--<button class="btn p-3">Ingresar</button>-->
    </form>
    <p class="parraRegistro">¿No tenes cuenta? <a href="index.php?s=registro" class="text-success ">Registrate ahora!</a> Te esperamos</p>
    <p class="parraRegistro">¿Olvidaste tu contraseña? <a href="index.php?s=recuperar-password" class="text-success ">Recupera tu contraseña</a>.</p>
</section>
