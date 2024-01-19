<?php

namespace Core;

class Authenticator
{

    public function attempt(mixed $email, mixed $password): bool
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = ?', [
                $email
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);
                return true;
            }
        }

        return false;
    }

    public function login($user): void
    {
        $is_verified = App::resolve(Database::class)
            ->query('select is_verified from users where email = ?', [
                $user['email']
            ])->find();

        $is_verified = $is_verified['is_verified'];

        $_SESSION['user'] = [
            'email' => $user['email'],
            'is_verified' => $is_verified
        ];

        session_regenerate_id(true);
    }

    public function logout(): void
    {
        Session::destory();
    }
}