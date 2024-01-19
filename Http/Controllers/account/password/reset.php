<?php

use Core\App;
use Core\Database;
use Core\Validator;

$msg = '';
$token = $_POST['token'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$db = App::resolve(Database::class);

// Check if user with the provided token exists in the database
$user = $db->query('
    SELECT id, password, email
    FROM users
    JOIN users_change_password ON users.id = users_change_password.user_id
    WHERE token = ?
', [
    $_POST['token'],
])->find();

if (!$user) {
    abort(401);
}

$errors = [];

// Validate password length
if (!Validator::string($password, 8, 256)) {
    $errors['password'] = 'Valid password';
}

// Check if the provided password matches the current password
if (password_verify($password, $user['password'])) {
    $errors['password'] = 'The password cannot be the same as before';
}

// Check if passwords match
if ($password !== $password2) {
    $errors['password'] = 'The passwords are not the same';
}

// If there are validation errors, return to the password update form with error messages
if (!empty($errors)) {
    return view('account/password/update', [
        'heading' => "Account Settings - Reset Password",
        'token' => $token,
        'errors' => $errors
    ]);
}

// Update password in the database
$db->query('UPDATE users SET password = ? WHERE email = ?', [
    password_hash($password, PASSWORD_BCRYPT),
    $user['email']
]);

// Delete token from users_change_password table
$db->query('DELETE FROM users_change_password WHERE token = ?', [$token]);

$msg = 'Password updated';

view('account/password/index', [
    'heading' => "Account Settings - Reset Password",
    'msg' => $msg
]);
