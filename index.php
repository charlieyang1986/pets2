<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once("vendor/autoload.php");

//Instantiate the F3 Base class
$f3 = Base::instance();

//Default route
$f3->route('GET /', function() {
    echo '<h1>My Pets<h1>';

    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /order', function() {
    //echo '<h1>Order Page<h1>';

    $view = new Template();
    echo $view->render('views/pet-order.html');
});


//Run F3
$f3->run();