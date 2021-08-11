<?php 


$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


?>

<section class="sectionRegistro">
    <h2 class="p-3">Iniciar Sesion</h2>

    <p class="p-3">Ingresar Datos del Administrador</p>

    <form action="acciones/login.php" method="post" class="formRegistro">

        <div class="form-group">
            <label for="email">Email</label>
            <input  type="email" id="email" name="email" class="form-control shadow" autocomplete="off"
            <?php if(isset($errores['email'])) echo 'aria-describedby="error-email"';?>
            value="<?= $oldData['email'] ?? '';?>">
            <?php
                if(isset($errores['email'])) : ?>
                <div id="error-email" class="msj-error text-center bg-warning mt-2"><?= $errores['email'];?></div>
            <?php
            endif; ?>

        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
             <input  type="password" id="password" name="password" class="form-control shadow" >
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success w-100 shadow mt-3">Ingresar</button>
        </div>
        <!--<button class="btn p-3">Ingresar</button>-->
    </form>
    <p class="text-center mt-4"><a href="../index.php?s=home">Volver a la Home</a></p>
</section>