<?php

use Core\App;
use Core\Database;

// Initialize message variable
$msg = '';

// Check if the user is logged in
if ($_SESSION['user']) {
    // Resolve the database dependency
    $db = App::resolve(Database::class);

    // Check if the user with the specified verification token
    $userExists = $db->query('SELECT * FROM users_email_confirmation WHERE token = ?', [
        $_GET['token'],
    ])->findOrFail();

    if ($userExists) {
        if(!timeComparison($userExists['created_at'], 15))
        {
            // Update user verification status and clear verification token
            $db->query('UPDATE users SET is_verified = 1 WHERE id = ?', [
                $userExists['user_id']
            ]);

            $db->query('DELETE FROM users_email_confirmation WHERE user_id = ?', [
                $userExists['user_id']
            ]);

            // Set success message
            $msg = 'Account confirmed';
            $_SESSION['user']['is_verified'] = true;
        }else{
            $msg = 'Link expired';
        }

        $db->query('DELETE FROM users_email_confirmation WHERE user_id = ?', [
            $userExists['user_id']
        ]);

    } else {
        // If user does not exist
        abort(404);
    }
} else {
    // If not logged in, redirect to login page with an error message
    return view('sessions/create', [
        'errors' => 'Login to confirm email'
    ]);
}


// Render the view with appropriate data
view('account/email/verification/index',[
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);
