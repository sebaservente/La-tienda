<?php 


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>

<section class="sectionRegistro">
    <h2 class="p-3 log">Iniciar Sesion</h2>

    <p class="p-3 log">Ingresa Datos del Administrador</p>

    <form action="acciones/login.php" method="post" class="formRegistro">

        <div class="form-group">
            <label for="email">Email</label>
            <input  type="email" id="email" name="email" class="form-control shadow" autocomplete="off"
            <?php if(isset($errores['email'])) echo 'aria-describedby="error-email"';?>
            value="<?= $oldData['email'] ?? '';?>">
            <?php
                if(isset($errores['email'])) : ?>
                <div id="error-email" class="msj-error pl-4"><?= $errores['email'];?></div>
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
    <a href="../index.php?s=home">Volver al Home</a>
</section>