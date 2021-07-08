<?php
/**
 * Retorna la extensión del nombre de un archivo.
 *
 * @param string $filename
 * @return bool|string
 */
function getExtension($filename) {
    return substr($filename, strrpos($filename, '.') + 1);
}

/**
 * Crea una imagen a partir de la $extension proporcionada.
 * De no brindar ninguna, trata de obtenerla desde el $imagePath.
 * Retorna false si la extensión no es "jpg", "jpeg", "gif" o "png",
 * o si ocurre algún error.
 *
 * @param string $imagePath
 * @param string|null $extension
 * @return bool|resource
 */
function createImage($imagePath, $extension = null) {
    $extension = $extension ?? getExtension($imagePath);

    switch($extension) {
        case 'jpg':
        case 'jpeg':
            return imagecreatefromjpeg($imagePath);
            break;

        case 'gif':
            return imagecreatefromgif($imagePath);
            break;

        case 'png':
            return imagecreatefrompng($imagePath);
            break;

        default:
            return false;
    }
}

/**
 * Graba una imagen en el $filePath indicado, en base a su extensión.
 * Opcionalmente, puede pasarse una $extension para forzar con qué formato
 * grabarla, al margen de la extensión propia del archivo. No modifica la
 * extensión que tenga el $filePath.
 * Retorna true en caso de éxito, false de lo contrario.
 *
 * @param resource $image
 * @param string $filePath
 * @param string|null $extension
 * @return bool
 */
function saveImage($image, $filePath, $extension = null) {
    $extension = $extension ?? getExtension($filePath);

    switch($extension) {
        case 'jpg':
        case 'jpeg':
            return imagejpeg($image, $filePath);
            break;

        case 'gif':
            return imagegif($image, $filePath);
            break;

        case 'png':
            return imagepng($image, $filePath);
            break;

        default:
            return false;
    }
}

/**
 * Intenta croppear una imagen a los tamaños indicados.
 * Retorna la imagen croppeada, o la original si hubo un error.
 * Retorna false si la imagen es igual o menor al tamaño de croppeo.
 *
 * @param resource $image
 * @param int $width
 * @param int $height
 * @return resource
 */
function cropImage($image, $width, $height) {
    $imageX = imagesx($image);
    $imageY = imagesy($image);
    if($imageY <= $height && $imageX <= $width) return $image;
    $startX = ($imageX / 2) - ($width / 2);
    $startY = ($imageY / 2) - ($height / 2);

    $cropped = imagecrop($image, [
        'x' => $startX,
        'y' => $startY,
        'width' => $width,
        'height' => $height,
    ]);

    return $cropped === false ? $image : $cropped;
}

/**
 * Crea dos versiones de la $image provista de $_FILES,
 * guardándolas en el $path indicado.
 * La primera con un ancho de 100px, manteniendo la proporción.
 * La segunda con un ancho de 550px, manteniendo la proporción.
 * Retorna un array con los nombres de las imágenes generadas,
 * usando time() o el $filename provisto. La imagen de 550px
 * tendrá de prefijo "big-" en el nombre.
 *
 * @param array $image
 * @param string $path
 * @param string|null $filename
 * @param bool|null $crop
 * @return array    Los nombres de las imágenes generadas.
 */
function generateSiteImages($image, $path, $filename = null, $crop = null) {
    $filename = $filename ?? time();
    $extension = getExtension($image['name']);
    $imageCopy = createImage($image['tmp_name'], $extension);

    $imageResized = imagescale($imageCopy, 300);
    $imageBigResized = imagescale($imageCopy, 750);

    if($crop) {
        [$imageeRsized, $imageBigResized] = generateCroppedImages($imageResized, $imageBigResized);
    }

    $resizedName = $filename . "." . $extension;
    $resizedBigName = "big  -" . $filename . "." . $extension;
    saveImage($imageResized, $path . $resizedName);
    saveImage($imageBigResized, $path . $resizedBigName);

    return ['name' => $resizedName, 'big' => $resizedBigName];
}

/**
 * Intenta croppear las imágenes a los tamaños del sitio.
 * Retorna un array con la imagen $normal croppeada en la primer posición,
 * y la imagen $big croppeada en la segunda.
 * De fallar, retorna las mismas imágenes.
 *
 * @param resource $normal
 * @param resource $big
 * @return array    La imagen $normal croppeada en la primer posición, la $big en la segunda.
 */
function generateCroppedImages($normal, $big) {
    return [
        cropImage($normal, 100, 100),
        cropImage($big, 550, 150)
    ];
}