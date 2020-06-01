<?php

use \Twig\Environment as Twig_Environment;
use \Twig\Loader\FilesystemLoader as Twig_Loader_Filesystem;

function view($template, $param = [])
{
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../src/resources/views/');
    $twig = new Twig_Environment($loader, array(
        'cache' => __DIR__ . '/../../../storage/cache',
        'debug' => atm('DEBUG') == 'TRUE' ? true : false,
    ));

    echo $twig->render($template, $param);
}

function atm($key)
{
    try {
        return getenv($key);
    } catch (Exception $e) {
        return null;
    }
}
