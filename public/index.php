<?php

require_once dirname(__DIR__) . '/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory

    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Routing
 */
// require '../App/Controllers/Posts.php';
// require '../Core/Router.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
// // Display the routing table
// echo '<pre>';
// //var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';


// Match the requested route
$url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }

$router->dispatch($url);