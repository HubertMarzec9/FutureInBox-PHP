<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUser = $db->query("select id from users where email = ?",[
    $_SESSION['user']['email']
])->findOrFail();

$emails = $db->query("select * from emails where user_id = ?", [
    $currentUser['id']
])->get();

//authorize($emails['user_id'] === $currentUser['id']); TODO

//dd($emails);

view('emails/index',[
    'heading' => "Scheduled emails",
    'emails' => $emails
]);
