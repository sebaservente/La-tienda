<?php
//  rutas de nuestro sitio.

$secciones = [
    'login' => [
        'title' => 'Admin de Tienda de Cervezas :: Iniciar Sesion ',
    ],
    'home' => [
        'title' => 'Admin de Tienda de Cervezas :: Bienvenido ',
        'requiresAuth' => true,
    ],
    'productos' => [
        'title' => 'Admin de Tienda de Cervezas :: Productos',
        'requiresAuth' => true,
    ],
    'editar-producto' => [
        'title' => 'Admin de Tienda de Cervezas:: Editar Producto',
        'requiresAuth' => true,
    ],
    'leer-pedidos' => [
        'title' => 'Admin de Tienda de Cervezas:: Todos los Pedidos',
        'requiresAuth' => true,
    ],
    'leer-usuarios' => [
        'title' => 'Admin de Tienda de Cervezas:: Todos los Usuarios',
        'requiresAuth' => true,
    ],
    'leer-producto' => [
        'title' => 'Admin de Tienda de Cervezas:: Descripcion del Producto',
        'requiresAuth' => true,
    ],
    'nuevo-producto'  => [
        'title' => 'Admin de Tienda de Cervezas :: Producto Nuevo',
        'requiresAuth' => true,
    ],
    '404' => [
        'title' => 'Admin de Tienda de Cervezas :: Página no encontrada'
    ],
    'mantenimiento' => [
        'title' => 'Admin de Tienda de Cervezas :: Mantenimiento en curso'
    ],
];


