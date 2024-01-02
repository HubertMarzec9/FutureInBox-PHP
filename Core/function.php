<?php

use Core\Session;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

#[NoReturn] function abort($code)
{
    http_response_code($code);
    echo $code;
    echo ':(';
    die();
}

function authorize($condition): void
{
    if (!$condition)
        abort(403);
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($file, $attributes = []): string
{
    extract($attributes);
    return require base_path('resources/views/' . $file . '.view.php');
}

function redirect(string $location): void
{
    header('location: ' . $location);
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}