<?php

view('error/index',[
    'heading' => 'Error. Status code - ' . http_response_code(),
]);