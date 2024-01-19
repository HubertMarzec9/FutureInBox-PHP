<?php

use Core\App;
use Core\Database;
use Core\Mailer;
use Core\Validator;

// Resolve dependencies
$db = App::resolve(Database::class);
$mailer = App::resolve(Mailer::class);

// Get the new email from the POST data
$email = $_POST['email'];
$password = $_POST['password'];

// Initialize message variable
$msg = '';

// Check the validity of reCAPTCHA token
$response = $_POST['g-recaptcha-response'];
$result = verifyRecaptcha($response, '6LdOSFUpAAAAAA6hpWPa0orxZji6CL3dx1YOw398');

$user = $db->query('SELECT password FROM users WHERE email = ?', [$_SESSION['user']['email']])->findOrFail();

// If reCAPTCHA is not verified, terminate the script
if (!$result['success']) {
    $msg = 'ReCAPTCHA not verified';
} elseif (!password_verify($password, $user['password'])) {
    $msg = 'Incorrect password';
} else {
    // Check if the new email is the same as the current email
    if ($email == $_SESSION['user']['email']) {
        $msg = 'Please enter a different email address';
    } elseif (!Validator::email($email)) {
        // Validate the email format
        $msg = 'Invalid email';
    } else {
        // Check if the new email already exists in the users table
        $checkUser = $db->query('SELECT id FROM users WHERE email = ?', [$email])->find();

        if (!$checkUser) {
            // If the new email does not exist, proceed with the email change process

            // Retrieve the user ID based on the current email
            $user = $db->query('SELECT id FROM users WHERE email = ?', [$_SESSION['user']['email']])->find();

            // Generate a unique token
            $token = sha1(uniqid());

            // Insert the change email request into the users_change_email table
            $db->query('INSERT INTO users_change_email (user_id, new_email, token) VALUES (?, ?, ?)', [
                $user['id'],
                $email,
                $token,
            ]);

            // Send an email with the change email token
            $mailer->setRecipient($email)->sendChangeEmail($token);

            // Set success message
            $msg = 'Link sent';
        } else {
            // If the new email already exists, display an error message
            $msg = 'Please enter a different email address';
        }
    }
}

// Render the view with appropriate data
view('account/email/change/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg,
]);
