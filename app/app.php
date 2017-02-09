<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";
    session_start();
    if (empty($_SESSION['cd_array'])) {
        $_SESSION['cd_array'] = array();
    }
    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../view'
    ));
    // home page has input for places
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    return $app;
?>
