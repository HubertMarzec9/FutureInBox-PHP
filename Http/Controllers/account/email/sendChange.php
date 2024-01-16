<?php

use Core\App;
use Core\Database;
use Core\Mailer;
use Core\Validator;

$db = App::resolve(Database::class);
$mailer = App::resolve(Mailer::class);

$email = $_POST['email'];
$msg = '';

//TODO 2x zmaina email

if (!Validator::email($email)) {
    $msg = 'Invalid email';
} else {
    $checkUser = $db->query('SELECT id FROM users WHERE email = ?', [$email])->find();


    if (!$checkUser) {
        $user = $db->query('SELECT id FROM users WHERE email = ?',
            [$_SESSION['user']['email']]
        )->find();

        $token = sha1(uniqid());

        $db->query('INSERT INTO users_change_email (user_id, new_email, token) VALUES (?, ?, ?)', [
            $user['id'],
            $email,
            $token,
        ]);

        $mailer->setRecipient($email)->sendChangeEmail($token);
        $msg = 'Link sent';
    } else {
        $msg = 'Please enter a different email address';
    }
}

return view('account/email/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg,
]);
