<section class="sectionRegistro">
    <h2>Recuperar contraseña</h2>
    <p>Escribi tu direccion de email en el formulario y te vamos a enviar un enlace para que puedas crear una contraseña nueva</p>
    <form action="acciones/enviar-recuperacion.php" method="post" class="p-3 m-auto formRegistro">

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

        <div class="text-center">
            <button class="btn btn-success botonRegistro">Enviar email de recuperacion</button>
        </div>
        <!--<button class="btn p-3">Ingresar</button>-->
    </form>
</section>

