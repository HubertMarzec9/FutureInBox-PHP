<?php

use Core\App;
use Core\Database;

$msg = '';

if ($_SESSION['user']) {
    $db = App::resolve(Database::class);

    $db->query('select * from users where verification_token = ? and email = ?', [
        $_GET['token'],
        $_SESSION['user']['email']
    ])->find();

    $db->query('UPDATE users SET is_verified = 1, verification_token = NULL WHERE verification_token = ?', [
        $_GET['token']
    ]);

    $msg = 'Konto potwierdzone';
} else {
    view('sessions/create',[
        'errors' => 'Login to confirm email'
    ]);
    die();
}

view('account/email/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);