<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUser = $db->query("select id from users where email = ?",[
    $_SESSION['user']['email']
])->findOrFail();

$email = $db->query("select * from emails where id = ?", [
    $_GET['id']
])->findOrFail();

authorize($email['user_id'] === $currentUser['id']);

view('emails/show',[
    'heading' => "Scheduled email",
    'email' => $email
]);