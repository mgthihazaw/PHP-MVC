<?php

namespace App\Controllers;

/**
 * Router
 *
 * PHP version 5.4
 */
class Posts extends \Core\Controller
{
    public function index()
    {
        echo "This is index method of post controller";
        echo '<p>Query string parameters: <pre>' .
            htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }
    public function show()
    {
        echo "This is show method of posts controller";
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}