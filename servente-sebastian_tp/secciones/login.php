<?php


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>

<section>
    <h2>Iniciar Sesión</h2>
    <p>Ingresa tus credenciales</p>
    <form action="acciones/login.php" method="post" class="p-3 m-auto">

        <div class="form-group">
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
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input  type="password" id="password" name="password" class="form-control shadow" >
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-secondary col-10 shadow">Ingresar</button>
        </div>
        <!--<button class="btn p-3">Ingresar</button>-->
    </form>
    <p>¿No tenes cuenta? <a href="index.php?s=registro" class="text-success">Registrate ahora!</a> Te esperamos</p>
</section>
