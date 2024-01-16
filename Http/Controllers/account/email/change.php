<?php

use Core\App;
use Core\Database;

$msg = '';

if ($_SESSION['user']) {
    $db = App::resolve(Database::class);

    $user = $db->query('
    SELECT id, new_email
    FROM users
    JOIN users_change_email ON users.id = users_change_email.user_id
    WHERE token = ?
    ', [
        $_GET['token'],
    ])->find();

    $db->query('UPDATE users SET is_verified = 1, verification_token = NULL, email = ? WHERE id = ?',[
        $user['new_email'],
        $user['id'],
    ]);

    $db->query('DELETE FROM users_change_email WHERE token = ?',[
        $_GET['token'],
    ]);

    $_SESSION['user']['email'] = $user['new_email'];

    $msg = 'Email updated';
} else {
    view('sessions/create', [
        'errors' => 'Login to confirm email'
    ]);
    die();
}

view('account/email/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);