<?php

use Core\Session;

view('sessions/create',[
    'errors' => Session::get('errors'),
    'heading' => 'Login'
]);