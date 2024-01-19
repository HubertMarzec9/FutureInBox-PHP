<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

// Check the validity of reCAPTCHA token
$response = $_POST['g-recaptcha-response'];
$result = verifyRecaptcha($response, '6LdOSFUpAAAAAA6hpWPa0orxZji6CL3dx1YOw398');

// If reCAPTCHA is not verified, terminate the script
if (!$result['success']) {
    $errors['reCaptcha'] = 'ReCAPTCHA not verified';
}

if (!Validator::string($_POST['title'], 1, 255)) {
    $errors['body'] = 'Title is required and Title cant be more than 255 char';
}

if (!Validator::string($_POST['body'], 1, 10000)) {
    $errors['body'] = 'Body is required and Body cant be more than 10 000 char';
}

if (!empty($errors)) {
    return view('emails/create',[
        'heading' => 'Create Email',
        'errors' => $errors
    ]);
}

$currentUser = $db->query("select id from users where email = ?",[
    $_SESSION['user']['email']
])->findOrFail();

$db->query('INSERT INTO emails(title, body, sent_date, user_id) VALUES(?, ?, ?, ?)', [
    $_POST['title'],
    $_POST['body'],
    $_POST['sent_date'],
    $currentUser['id'],

]);

header('location: /scheduled-emails');
die();
