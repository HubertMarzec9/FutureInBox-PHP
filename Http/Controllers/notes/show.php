<?php

use Core\Database;
use Core\App;


$currentUserId = 1;


$db = App::resolve(Database::class);

$note = $db->query("select * from posts where id = ?", [
        $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show',[
    'heading' => "Note",
    'note' => $note
]);
