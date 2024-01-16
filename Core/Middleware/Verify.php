<?php

namespace Core\Middleware;

use Core\App;
use Core\Database;

class Verify
{
    public function handle()
    {
        $db = App::resolve(Database::class);

        $is_verified = $db->query('select is_verified from users where email = ?', [
            $_SESSION['user']['email']
        ])->find();

        $is_verified = $is_verified['is_verified'];

        if (!$is_verified) {
            header('location: /');
            exit();
        }
    }
}