<?php

// Cabeçalho que ira definir a saida da pagina
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

// recebendo a url da imagem
$filename = "" . $_GET['i'];

$percent = 0.10;

// pegando as dimensoes reais da imagem, largura e altura
list($width, $height) = getimagesize($filename);

//setando a largura da miniatura
if (isset($_GET['width'])) {
    $new_width = $_GET['width'];
} else {
    $new_width = 150;
}
//setando a altura da miniatura
if (isset($_GET['height'])) {
    $new_height = $_GET['height'];
} else {
    $new_height = 150;
}

//gerando a a miniatura da imagem
$extension = pathinfo($filename, PATHINFO_EXTENSION);

if ($extension == "jpg" || $extension == "jpeg") {
    header('Content-type: image/jpeg', true);
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

//o 3� argumento � a qualidade da imagem de 0 a 100
    imagejpeg($image_p, null, 100);
    imagedestroy($image_p);
}

if ($extension == "png") {
    header('Content-type: image/png', true);
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefrompng($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

//o 3� argumento � a qualidade da imagem de 0 a 9
    imagepng($image_p, null, 9);
    imagedestroy($image_p);
}
?>