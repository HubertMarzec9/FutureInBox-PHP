<?php

use Core\App;
use Core\Database;
use Core\Mailer;

// Resolve dependencies
$db = App::resolve(Database::class);

// Check the validity of reCAPTCHA token
$response = $_POST['g-recaptcha-response'];
$result = verifyRecaptcha($response, '6LdOSFUpAAAAAA6hpWPa0orxZji6CL3dx1YOw398');

// If reCAPTCHA is not verified, terminate the script
if (!$result['success']) {
    $msg = 'ReCAPTCHA not verified';
    view('account/email/verification/index', [
        'heading' => "Account Settings - Email",
        'msg' => $msg
    ]);
}


// Retrieve the verification token and verification status from the users table
$user = $db->query('SELECT id, is_verified FROM users WHERE email = ?', [
    $_SESSION['user']['email']
])->findOrFail();


// Check if the email is already confirmed
if ($user['is_verified']) {
    $msg = 'Email is already confirmed';
} else {

    $time = $db->query('SELECT created_at FROM users_email_confirmation WHERE user_id = ?', [
        $user['id']
    ])->find();

    if (!$time) {
        $token = sha1(uniqid());

        $db->query('INSERT INTO users_email_confirmation (user_id, token) VALUES (?, ?)', [
            $user['id'],
            $token,
        ]);

        // Set success message
        $msg = 'Link sent';

        // Resolve the mailer dependency
        $mailer = App::resolve(Mailer::class);

        // Send a verification email with the verification token
        $mailer->setRecipient($_SESSION['user']['email'])
            ->sendVerificationEmail($token);
    } else if (!timeComparison($time['created_at'], 5)) {
        $msg = 'Wait 5 minutes before sending another link';
    } else {
        $db->query('UPDATE users_email_confirmation SET created_at = ? WHERE user_id = ?', [
            date('Y-m-d H:i:s'),
            $user['id'],
        ]);

        $token = $db->query('SELECT token FROM users_email_confirmation WHERE user_id = ?', [
            $user['id'],
        ])->findOrFail();
        $token = $token['token'];

        // Set success message
        $msg = 'Link sent';

        // Resolve the mailer dependency
        $mailer = App::resolve(Mailer::class);

        // Send a verification email with the verification token
        $mailer->setRecipient($_SESSION['user']['email'])
            ->sendVerificationEmail($token);
    }
}

// Render the view with appropriate data
view('account/email/verification/index', [
    'heading' => "Account Settings - Email",
    'msg' => $msg
]);
