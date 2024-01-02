<?php

use Core\App;
use Core\Database;
use Core\Validator;


$currentUserId = 1;


$db = App::resolve(Database::class);

$note = $db->query("select * from posts where id = ?", [
        $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Body is required and Body cant be more than 1 000 char';
}

if(count($errors)){
    return view('notes/edit',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query("update posts set body = ? where id = ?",[
    $_POST['body'],
    $_POST['id']
]);

header('location: /notes');
die();