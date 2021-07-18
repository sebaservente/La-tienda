<?php
/*
 * funciones sobre los productos de nuestro sistema.
 * productos  de la base de datos.
 * @param conectarnos a mysql
 */
function getProducto($db) {
    $query = "SELECT *,
                    GROUP_CONCAT(t.nombre SEPARATOR ' | ' ) AS tags
                FROM la_tienda.cervezas c 
                LEFT JOIN la_tienda.cervezas_has_tags cht 
                ON c.id_cerveza = cht.cervezas_id_cerveza
                LEFT JOIN la_tienda.tags t
                ON t.id_tags = cht.tags_id_tags
                GROUP BY c.id_cerveza";

    $res = mysqli_query($db, $query);

    $salida = [];

    while ($fila = mysqli_fetch_assoc($res)){
        $salida[] = $fila;  
    }
    return $salida;
    //$fileName = "api/productos.json";
    //$contenido = file_get_contents(PRODUCTOS_JSON_FILEPATH);
    //return json_decode($contenido, true);
}

// retornamos la noticia con el $id
// retorna array con datos de los productos

function productosporid ($db, $id) {
    // seguridad inyeccion SQL.
    $id = mysqli_real_escape_string($db, $id);
    $query = " SELECT *,
                        GROUP_CONCAT(t.nombre SEPARATOR ' | ' ) AS tags
                    FROM la_tienda.cervezas c 
                    LEFT JOIN la_tienda.cervezas_has_tags cht 
                    ON c.id_cerveza = cht.cervezas_id_cerveza
                    LEFT JOIN la_tienda.tags t
                    ON t.id_tags = cht.tags_id_tags
                    WHERE c.id_cerveza = '" . $id . "' 
                    GROUP BY c.id_cerveza";

    $res = mysqli_query($db, $query);
    
    return mysqli_fetch_assoc($res);
}


/*
*
*
*
*/
function productoEditar($db, $id, $title, $intro, $text, $definicion, $precio, $img, $imgAlt, $idUser){

    $id = mysqli_real_escape_string($db, $id);
    $title = mysqli_real_escape_string($db, $title);
    $intro = mysqli_real_escape_string($db, $intro);
    $text = mysqli_real_escape_string($db, $text);
    $definicion = mysqli_real_escape_string($db, $definicion);
    $precio = mysqli_real_escape_string($db, $precio);
    $imgAlt = mysqli_real_escape_string($db, $imgAlt);
    $idUser = mysqli_real_escape_string($db, $idUser);



    if(!empty($img['tmp_name'])) {
        $nombreImagenes = generateSiteImages($img, PATH_IMG . "/", null, true);
        $nombreImagen   = $nombreImagenes['name'];

        // si solicita la imagen
        $queryImg = ", img = '" . $nombreImagen . "'";
    } else {
        $queryImg = "";      
    }
    
    // 1ra parte del query
    $query = "UPDATE cervezas
            SET title = '" . $title . "', 
                intro = '" . $intro . "',
                text = '" . $text . "',
                definicion = '" . $definicion . "',
                precio = '" . $precio . "',
                alt_img = '" . $imgAlt . "',
                usuarios_id_usuario = '" . $idUser . "'
                " . $queryImg . "
            WHERE id_cerveza  = '" . $id . "'";      

    $exito = mysqli_query($db, $query);
    
    return $exito;       
}

function productoCrear($db, $title, $intro, $text, $definicion, $precio, $img, $imgAlt, $idUser) {
    // escapamos los valores
    // sin la $img array
    $title = mysqli_real_escape_string($db, $title);
    $intro = mysqli_real_escape_string($db, $intro);
    $text = mysqli_real_escape_string($db, $text);
    $definicion = mysqli_real_escape_string($db, $definicion);
    $precio = mysqli_real_escape_string($db, $precio);
    $imgAlt = mysqli_real_escape_string($db, $imgAlt);
    
    // UPDATE 15/06/2020 reemplazamos el upload de imagen por la funcion que hace el resize
    // recibe 4 parametros 
    // name imagen normal
    // big imagen grande
    $nombreImagenes = generateSiteImages($img, PATH_IMG . "/", null, true);
    // Subimos la imagen.
    // Para guardar la imagen, necesitamos definir el nombre y la ruta donde se va a guardar.
    // $nombreImg = date('YmdHis'). ".jpg";
    // $imgFilepath = PATH_IMG . "/" . $nombreImg;

    // Movemos la imagen de su ubicación temporal a su destino final, a través de la función
    // move_uploaded_file()
    // *move_uploaded_file($img['tmp_name'], $imgFilepath);*/

    // $query
    // NOW retorna fecha y hora actual
    $query = "INSERT INTO cervezas (title, intro, text , img, alt_img, precio, definicion, usuarios_id_usuario)
                VALUES ('" . $title . "', '" . $intro . "', '" . $text . "', '" . $nombreImagenes['name'] . "', '" . $imgAlt . "', '" . $precio . "', '" . $definicion . "', '" . $idUser . "')"; 

    // ejecutamos la consulta
    // tres posibles valores 
    // 1 select si tenia exito resulSet
    // 2 false
    // 3 true
    $exito = mysqli_query($db, $query);
    // echo $query;
    // echo mysqli_error($db);

    if($exito){
        return true;
    } else {
        return false;
    }
}
/**
 * Funcion para eliminar productos
 */
function productoBorrar($db, $id) {
    // siempre escapamos valores que vienen del usuario
    $id =  mysqli_real_escape_string($db, $id);
    $query = "DELETE FROM cervezas
              WHERE id_cerveza = '" . $id . "'";

    $exito = mysqli_query($db, $query);
    
    return $exito;
    //  *  return mysqli_query($db, $query);
}