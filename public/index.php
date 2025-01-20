<?php 

require '../vendor/autoload.php';
require '../partials/header.php' ;
$uri = $_SERVER['REQUEST_URI'];

$router = new  AltoRouter();

$router->map('GET,POST','/', function () {
    require '../templates/home.php' ;
});

$match = $router->match();
if ($match) {
    call_user_func_array($match['target'],$match['params']);
} else {
    echo " Cette page n'existe pas ";
}

require '../partials/footer.php' ;