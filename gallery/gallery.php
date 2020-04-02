<?php

define('imagesDirBig', 'images/big/');
define('imagesDirSmall', 'images/small/');

$images = scandir(imagesDirBig);
$images = array_diff($images, ['.', '..']);

$tmp = '';
foreach ($images as $image) {
    $tmp .= "
            <li>
                <a href=" . imagesDirBig . $image . " target='_blank'>
                    <img src=" . imagesDirSmall . $image . " alt='img'>
                </a>
            </li>";
}

$html = file_get_contents('gallery.tpl');
$html = str_replace(['GALLERY'], [$tmp], $html);
echo $html;
