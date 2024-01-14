<?php

/** @var TYPE_NAME $router */
$router->get('/', 'index.php');
$router->get('/contact', 'contact.php');

/*
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/index.php')->only('auth');
$router->delete('/note/edit', 'notes/destroy.php')->only('auth');;

$router->get('/notes/create', 'notes/create.php')->only('auth');;
$router->post('/notes', 'notes/store.php')->only('auth');;

$router->get('/note/edit','notes/edit.php')->only('auth');;
$router->patch('/notes','notes/update.php')->only('auth');;
*/

// Registration
$router->get('/registration', 'registration/create.php')->only('guest');
$router->post('/registration', 'registration/store.php')->only('guest');;

// Login
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/login', 'sessions/destroy.php')->only('auth');

//Settings*

$router->get('/account-settings', 'account/index.php')->only('auth');
$router->get('/change-password', 'account/index.php')->only('auth'); //TODO
$router->get('/change-email', 'account/email/index.php')->only('auth'); //TODO
$router->get('/confirm-email', 'account/email/index.php')->only('auth'); //TODO
$router->post('/confirm-email', 'account/email/confirm.php')->only('auth');

// Emails*

$router->get('/create-email', 'emails/create.php')->only('auth');
$router->post('/email', 'emails/store.php')->only('auth');

$router->get('/scheduled-emails', 'emails/index.php')->only('auth');
$router->get('/email', 'emails/show.php')->only('auth');

