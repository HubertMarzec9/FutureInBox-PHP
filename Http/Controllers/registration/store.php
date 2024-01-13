<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Valid email';
}

if (!Validator::string($_POST['password'], 8, 256)) {
    $errors['password'] = 'Valid password';
}

if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}


$user = $db->query('select * from users where email = ?', [
    $_POST['email']
])->find();

if($user){

    header('location: /login');
}else{
    $user = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    $verification_token = sha1(uniqid());

    $db->query('INSERT INTO users (email, password, verification_token) VALUES (?, ?, ?)', [
        $user['email'],
        password_hash($user['password'], PASSWORD_BCRYPT),
        $verification_token,
    ]);

    (new Core\Authenticator)->login($user);

    header('location: /');
}

die();
