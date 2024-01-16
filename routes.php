<?php

/** @var TYPE_NAME $router */
$router->get('/', 'index.php');
//$router->get('/contact', 'contact.php');

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
$router->patch('/change-email', 'account/email/sendChange.php')->only('auth');
$router->get('/change', 'account/email/change.php');

$router->get('/confirm-email', 'account/email/index.php')->only('auth'); //TODO
$router->post('/confirm-email', 'account/email/sendVerification.php')->only('auth');
$router->get('/confirm', 'account/email/confirm.php');


// Emails*

$router->get('/create-email', 'emails/create.php')->only('verify');
$router->post('/email', 'emails/store.php')->only('verify');

$router->get('/scheduled-emails', 'emails/index.php')->only('verify');
$router->get('/email', 'emails/show.php')->only('verify');

