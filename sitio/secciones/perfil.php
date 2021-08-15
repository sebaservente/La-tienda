<?php
require 'data/bootstrap.php';

/*$idUsuario = authObtenerUsuario()['id_usuario'];
echo "<pre>";
print_r($idUsuario);
echo "</pre>";*/

$usuarios = usuarioTraerPorId($db, $_GET['id']);

// traemos la array de errores
$errores = sessionValueGetFlash('errores', []);
$oldData = sessionValueGetFlash('old_data', []);


/*if(!authEstaAutenticado()) {*/
    /*    $_SESSION['seccion_preten'] = $seccion;*/
/*    $_SESSION['successInfo'] = "Necesitas estar autenticado para realizar esta accion";
    header('Location: ../index.php?s=login');
    exit;
}*/
?>
<section class="container" id="sectionPerfil">
    <h2 class="m-4">Perfil de Usuarios</h2>
    <div class="perfil">
        <div class="divImagen">
            <figure>
                <img src="imgs/<?= $usuarios['img'];?>" class="img-fluid figure-img" alt="<?= htmlspecialchars($usuarios['alt_img']);?>">
            </figure>
        </div>
        <div class="divDatos">
            <div class="divNombreApellido">
                <p class="anterior"><i class="bi bi-person-circle mr-2"></i>Email</p>
                <p class="primero" title="<?=$usuarios['email'];?>"> <?=$usuarios['email'];?></p>
            </div>
            <div class="divNombreApellido">
                <p class="anterior"><i class="bi bi-person-circle mr-2"></i>Nombre</p>
                <p class="primero"  title="<?=$usuarios['nombre'];?>"><?=$usuarios['nombre']; ?></p>
                <!--<p class="segundo p-2"> <?/*=$usuarios['apellido']; */?></p>-->
            </div>
            <div class="divNombreApellido">
                <p class="anterior"><i class="bi bi-exclamation-circle mr-2"></i>Apodos</p>
                <p class="primero"  title="<?=$usuarios['apodo'];?>"><?=$usuarios['apodo']; ?></p>
                <!--<p>Id: <?/*=$usuarios['id_usuario']; */?></p>-->
            </div>

        </div>
        <div class="divAccion">
            <p class="bg-dark p-2 mr-2"><i class="bi bi-pencil-square text-success"></i><a href="index.php?s=editar-usuario&id=<?=$usuarios['id_usuario'];?>" class="p-2 edit" >Editar </a></p>
            <p class="bg-dark p-2 mr-2"><i class="bi bi-trash text-danger"></i><a href="acciones/eliminar-usuario.php?id=<?=$usuarios['id_usuario'];?>" class="borrar p-2 ">Eliminar</a></p>
        </div>
    </div>
</section>
<script>
    window.addEventListener('DOMContentLoaded', function(){
        const linksEliminar = document.querySelectorAll('.borrar');
        linksEliminar.forEach(function(aElem) {
            aElem.addEventListener('click', function(ev){
                if(!confirm('¡Atención! Estas a punto de eliminar tu cuenta, se borrara toda la informacion asociada!')){
                    ev.preventDefault();
                }
            });
        });
    });
    window.addEventListener('DOMContentLoaded', function(){
        const linksEliminar = document.querySelectorAll('.edit');
        linksEliminar.forEach(function(aElem) {
            aElem.addEventListener('click', function(ev){
                if(!confirm('¡Atención! La imagen del menu se actualizara al reiniciar sesion!')){
                    ev.preventDefault();
                }
            });
        });
    });
</script>