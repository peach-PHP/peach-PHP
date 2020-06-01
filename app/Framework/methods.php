<?php

use \Twig\Environment as Twig_Environment;
use \Twig\Loader\FilesystemLoader as Twig_Loader_Filesystem;

function view($template, $param = [])
{
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../src/resources/views/');
    $twig = new Twig_Environment($loader, array(
        'cache' => __DIR__ . '/../../../storage/cache',
        'debug' => true,
    ));

    echo $twig->render($template, $param);
}
