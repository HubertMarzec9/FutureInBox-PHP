<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const  BASE_PATH = __DIR__ . '/../';

require BASE_PATH . ('/vendor/autoload.php');

require(BASE_PATH . 'Core/function.php');

require base_path('bootstrap.php');


$router = new Router();

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('/routes.php');
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    $router->route($url, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previousUrl());
}

Session::unflash();