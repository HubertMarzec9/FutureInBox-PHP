<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$notes = $db->query("select * from posts where user_id = 1" )->get();


view('notes/index',[
    'heading' => 'Notes',
    'notes' => $notes
]);
