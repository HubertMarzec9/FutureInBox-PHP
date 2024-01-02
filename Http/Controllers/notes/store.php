<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Body is required and Body cant be more than 1 000 char';
}

if (!empty($errors)) {
    return view('notes/create',[
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO posts(body, user_id) VALUES(?, ?)', [
    $_POST['body'],
    1
]);

header('location: /notes');
die();
