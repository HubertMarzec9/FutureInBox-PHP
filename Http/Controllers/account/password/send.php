<?php

use Core\App;
use Core\Database;
use Core\Mailer;
use Core\Validator;

// Resolve dependencies
$db = App::resolve(Database::class);
$mailer = App::resolve(Mailer::class);

// Initialize message variable
$msg = '';

// Check the validity of reCAPTCHA token
$response = $_POST['g-recaptcha-response'];
$result = verifyRecaptcha($response, '6LdOSFUpAAAAAA6hpWPa0orxZji6CL3dx1YOw398');

// If reCAPTCHA is not verified, set an error message and return the appropriate view
if (!$result['success']) {
    $msg = 'ReCAPTCHA not verified';
    return view('account/password/index', [
        'heading' => "Account Settings - Email",
        'msg' => $msg,
    ]);
}

// Retrieve user information from the database
$user = $db->query('SELECT id, is_verified FROM users WHERE email = ?', [
    $_SESSION['user']['email']
])->find();

// Check if the user's email is not verified
if (!$user || !$user['is_verified']) {
    // Set message and return view
    $msg = 'Confirm email';
    return view('account/email/index', [
        'heading' => "Account Settings - Email",
        'msg' => $msg,
    ]);
}

// Generate a unique token
$token = sha1(uniqid());

// Insert token into the users_change_password table
$db->query('INSERT INTO users_change_password (user_id, token) VALUES (?, ?)', [
    $user['id'],
    $token,
]);

// Send reset password email with the token
$mailer->setRecipient($_SESSION['user']['email'])
    ->sendResetPassword($token);

// Set success message
$msg = 'Link sent';

// Render the appropriate view based on the email verification status
return view('account/password/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg,
]);
