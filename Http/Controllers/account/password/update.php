<?php

use Core\App;
use Core\Database;

// Resolve the database dependency
$db = App::resolve(Database::class);

// Retrieve the creation time of the token from the users_change_password table
$time = $db->query('SELECT created_at FROM users_change_password WHERE token = ?', [
    $_GET['token'],
])->findOrFail();

// Check if the token exists
if ($time) {
    $time = $time['created_at'];

    // Check if more than 15 minutes have passed since token creation
    if (timeComparison($time, 15)) {
        // If more than 15 minutes, delete the token and return 401 Unauthorized
        $db->query('DELETE FROM users_change_password WHERE token = ?', [
            $_GET['token'],
        ]);

        abort(401);
    }

    // If less than 15 minutes, render the password update view
    return view('account/password/update', [
        'heading' => "Account Settings - Reset Password",
    ]);
}

// If token does not exist, return 404 Not Found
abort(404);
