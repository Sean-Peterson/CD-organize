<?php
    date_default_timezone_set('America/Los_Angeles');
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
        return $app['twig']->render('index.html.twig', array('cds' => CD::getAll()));
    });

    $app->post("/add", function() use ($app) {
        return $app['twig']->render('add.html.twig', array('cds' => CD::getAll()));
    });

    $app->post("/submit", function() use ($app) {
        $new_cd = new CD($_POST['artist'], $_POST['title'], $_POST['year']);
        $new_cd->save();
        return $app['twig']->render('index.html.twig', array('cds' => CD::getAll()));
    });








    $app->post("/delete", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cds' => CD::delete()));
    });

    return $app;
?>
