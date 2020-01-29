<?php

// echo 'QUERYSTRING = "' . $_SERVER['QUERY_STRING'] . '" <br>';
// echo 'Requested URL = "' . $_SERVER['REQUEST_URI'] . '"';
require '../Core/Router.php';

$router = new Router();

$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('/posts/new', ['controller' => 'Posts', 'action' => 'new']);

$url = $_SERVER['REQUEST_URI'];

if ($router->match($url)) {
    echo "<pre>";
    var_dump($router->getParams());
    echo "</pre>";
} else {
    echo "No route found for URL:{$url}";
}
// echo "<pre>";
// var_dump($router->getRoutes());
// echo "</pre>";