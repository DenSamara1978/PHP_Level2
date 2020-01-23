<?php

require_once 'Twig/Autoloader.php';

Twig_Autoloader::register ();

try 
{
    $loader = new Twig_Loader_Filesystem ( 'templates' );
    $twig = new Twig_Environment ( $loader );
    $template = $twig->loadTemplate ( 'gallery.tmpl' );

    //*** Логика веб-приложения */

    $gallery_small = 'gallery_img/small';
    $gallery_big = 'gallery_img/big';
    $imagesSmall = scandir ( $gallery_small );
    $imagesBig = scandir ( $gallery_big );

    $files = array ();
    for ( $i = 2; $i < count ( $imagesSmall ); $i++ )
        array_push ( $files, array ( 'imageSmall' => $gallery_small . '/' . $imagesSmall [$i], 'imageBig' => $gallery_big . '/' . $imagesBig [$i] ));

    //*** */
  
    echo $template->render ( array (
        'files' => $files
    ));
}
catch ( Exception $e )
{
    die ( 'ERROR: ' . $e->getMessage ());
}

?> 
