<?php
session_start();
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once("vendor/autoload.php");

//Instantiate the F3 Base class
$f3 = Base::instance();

//Default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /order', function($f3) {
    if($_SERVER['REQUEST_METHOD']=='POST') {
        if (empty($_POST['petkind'])) {
            echo "Please supply a pet type";
        } else {
            $_SESSION['pet'] = $_POST['petkind'];
        $f3->reroute("summary");
        }
    }
    $view = new Template();
    echo $view->render('views/pet-order.html');

});

//Run F3
$f3->run();