<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$token = $db->query('select verification_token from users where email = ?', [
    $_SESSION['user']['email']
])->find();

$token = $token['verification_token'];

if($token !== null)
{
    $msg = 'Link wysłany';

    $mailer = App::resolve('Core\Mailer');
    $mailer->setRecipient('hubertmarzec000@gmail.com')
        ->sendVerificationEmail($token);
}else{
    $msg = 'error';
}


view('account/email/index',[
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);