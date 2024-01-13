<?php

use Core\Container;
use Core\Database;
use Core\App;
use Core\Mailer;

$container = new Container();

$container->bind('Core\Database', function (){
    $config = require base_path('config.php');
    return new Database($config['database']);
});

$container->bind('Core\Mailer', function (){
    $config = require base_path('config.php');
    return new Mailer($config['mail']);
});

App::setContainer($container);