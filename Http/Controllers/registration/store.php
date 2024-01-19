<?php

use Core\Database;
use Core\Validator;
use Core\App;

// Resolve database dependency
$db = App::resolve(Database::class);

// Array to store validation errors
$errors = [];

// Check the validity of reCAPTCHA token
$response = $_POST['g-recaptcha-response'];
$result = verifyRecaptcha($response, '6LdOSFUpAAAAAA6hpWPa0orxZji6CL3dx1YOw398');

// If reCAPTCHA is not verified, terminate the script
if (!$result['success']) {
    $errors['reCaptcha'] = 'ReCAPTCHA not verified';
}

// Check the validity of the email address
if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Invalid email address';
}

// Check the validity of the password
if (!Validator::string($_POST['password'], 8, 256)) {
    $errors['password'] = 'Invalid password';
}

// If there are validation errors, return to the registration form with error messages
if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}

// Check if the user with the provided email already exists
$user = $db->query('SELECT * FROM users WHERE email = ?', [
    $_POST['email']
])->find();

// If the user exists, redirect to the login page
if ($user) {
    header('location: /login');
    die();
}

// Create a new user array with email, password, and verification token
$user = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

// Insert the new user into the database
$db->query('INSERT INTO users (email, password) VALUES (?, ?)', [
    $user['email'],
    password_hash($user['password'], PASSWORD_BCRYPT),
]);

// Log in the new user
(new Core\Authenticator)->login($user);

// Redirect to the homepage
header('location: /');
die();


