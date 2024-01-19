<?php

/** @var TYPE_NAME $router */
$router->get('/', 'index.php');

// Registration
$router->get('/registration', 'registration/create.php')->only('guest');
$router->post('/registration', 'registration/store.php')->only('guest');;

// Login
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/login', 'sessions/destroy.php')->only('auth');

//Settings*

$router->get('/account-settings', 'account/index.php')->only('auth');

$router->get('/change-email', 'account/email/change/index.php')->only('auth');
$router->patch('/change-email', 'account/email/change/send.php')->only('auth');
$router->get('/change', 'account/email/change/confirm.php');

$router->get('/confirm-email', 'account/email/verification/index.php')->only('noVerify');
$router->post('/confirm-email', 'account/email/verification/send.php')->only('noVerify');
$router->get('/confirm', 'account/email/verification/confirm.php');

$router->get('/reset-password', 'account/password/index.php')->only('auth');
$router->patch('/reset-password', 'account/password/send.php')->only('auth');
$router->get('/reset','account/password/update.php');
$router->patch('/reset','account/password/reset.php');


// Emails*

$router->get('/create-email', 'emails/create.php')->only('verify');
$router->post('/email', 'emails/store.php')->only('verify');

$router->get('/scheduled-emails', 'emails/index.php')->only('verify');
$router->get('/email', 'emails/show.php')->only('verify');

//Error

$router->get('/error', 'error/index.php');


