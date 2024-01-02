<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$auth = (new Authenticator);

if ($auth->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}


$form->setError('email', 'No matching account')
     ->throw();

redirect('/login');





