<?php

/** @var TYPE_NAME $router */
$router->get('/', 'index.php');
$router->get('/contact', 'contact.php');

/*
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note/edit', 'notes/destroy.php')->only('auth');;

$router->get('/notes/create', 'notes/create.php')->only('auth');;
$router->post('/notes', 'notes/store.php')->only('auth');;

$router->get('/note/edit','notes/edit.php')->only('auth');;
$router->patch('/notes','notes/update.php')->only('auth');;
*/

$router->get('/registration', 'registration/create.php')->only('guest');
$router->post('/registration', 'registration/store.php')->only('guest');;

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/login', 'sessions/destroy.php')->only('auth');
