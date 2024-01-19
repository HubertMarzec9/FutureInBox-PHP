<?php

use Core\App;
use Core\Database;

// Initialize message variable
$msg = '';
$db = App::resolve(Database::class);

// Retrieve the creation time of the token from the users_change_password table
$time = $db->query('SELECT created_at FROM users_change_email WHERE token = ?', [$_GET['token']])->find();

// Check if the token exists and if more than 15 minutes have passed since token creation
if ($time && timeComparison($time['created_at'], 15)) {
    // If more than 15 minutes, delete the token and return 401 Unauthorized
    $db->query('DELETE FROM users_change_email WHERE token = ?', [$_GET['token']]);
    abort(401);
}

// If token does not exist, return 404 Not Found
if (!$time) {
    abort(404);
}

// Check if the user is logged in
if (!$_SESSION['user']) {
    // If not logged in, redirect to login page with an error message
    return view('sessions/create', ['errors' => 'Login to confirm email']);
}

// Retrieve user information based on the token from the users_change_email table
$user = $db->query('
    SELECT id, new_email
    FROM users
    JOIN users_change_email ON users.id = users_change_email.user_id
    WHERE token = ?
', [$_GET['token']])->find();

// Update user information in the database
$db->query('UPDATE users SET is_verified = 1, verification_token = NULL, email = ? WHERE id = ?', [
    $user['new_email'],
    $user['id'],
]);

// Delete the token from the users_change_email table
$db->query('DELETE FROM users_change_email WHERE token = ?', [$_GET['token']]);

// Update the email in the session variable
$_SESSION['user']['email'] = $user['new_email'];

// Set success message
$msg = 'Email updated';

// Render the view with appropriate data
return view('account/email/change/index',[
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);
