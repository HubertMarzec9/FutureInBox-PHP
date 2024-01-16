<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private PHPMailer $mailer;

    public function __construct($config)
    {
        $this->mailer = new PHPMailer(true);

        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = $config['encryption'];
        $this->mailer->Port = $config['port'];

        $this->mailer->setFrom($config['username'], 'FutureInBox');
    }

    public function setRecipient($email, $name = '')
    {
        $this->mailer->addAddress($email, $name);

        return $this;
    }

    public function send($subject, $body)
    {
        try {
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
            echo 'Wiadomość została wysłana';
        } catch (Exception $e) {
            echo "Błąd: {$this->mailer->ErrorInfo}";
        }
    }

    public function sendVerificationEmail($token): void
    {
        $subject = 'Potwierdzenie rejestracji';
        $body = "Kliknij poniższy link, aby potwierdzić swoją rejestrację: <br> localhost:8000/confirm?token=$token";

        $this->mailer->isHTML(true);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        try {
            $this->mailer->send();
        } catch (Exception $e) {
            abort($this->mailer->ErrorInfo);
        }
    }
    public function sendChangeEmail($token): void
    {
        $subject = 'Potwierdzenie zmiany email';
        $body = "Kliknij poniższy link, aby potwierdzić zmiane email: <br> localhost:8000/change?token=$token";

        $this->mailer->isHTML(true);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        try {
            $this->mailer->send();
        } catch (Exception $e) {
            abort($this->mailer->ErrorInfo);
        }
    }
}
