<section class="container">
    <h2>Registrarse</h2>
    <p>Completa el formulario para poder estar registardo</p>

    <form action="acciones/registro.php" method="post" class="formRegistro">
        <fieldset >
            <legend>Datos de identificación</legend>
            <div class="form-file">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-file">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                <button type="button" class="form-pass-button" data-input="password">ver pass</button>
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
        <button class="btn btn-success botonRegistro">Registrarse ProgChamp</button>
    </form>

    <p>¿Ya tenes cuenta? <a href="index.php?s=login">inicia sesión</a></p>
</section>

<script src="js/pass.js"></script>