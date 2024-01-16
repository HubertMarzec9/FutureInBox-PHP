<?php

use Core\App;
use Core\Database;
use Core\Mailer;

$db = App::resolve(Database::class);

$token = $db->query('select verification_token, is_verified from users where email = ?', [
    $_SESSION['user']['email']
])->find();

if ($token['is_verified']) {
    $msg = 'Email is already confirmed';
} else {
    if ($token !== null) {
        $token = $token['verification_token'];
        $msg = 'Link sent';

        $mailer = App::resolve(Mailer::class);
        $mailer->setRecipient($_SESSION['user']['email'])
            ->sendVerificationEmail($token);
    } else {
        $msg = 'error';
    }
}

view('account/email/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);