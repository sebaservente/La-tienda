<section class="container">
    <h2>Perfil de Usuarios</h2>
    <p>Email: <?= authObtenerUsuario()['email'] ?></p>
    <p>Nombre: <?= authObtenerUsuario()['nombre'] ?></p>
    <p>Apellido: <?= authObtenerUsuario()['apellido'] ?></p>
    <p>ID:<?= authObtenerUsuario()['id_usuario'] ?></p>
</section>
