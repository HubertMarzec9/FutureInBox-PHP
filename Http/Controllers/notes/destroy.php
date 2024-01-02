<?php

use Core\Database;
use Core\App;

$currentUserId = 1;

$db = App::resolve(Database::class);

$note = $db->query("select * from posts where id = ?", [
        $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("delete from posts where id = ?", [
    $_POST['id']]
);

redirect('/notes');
