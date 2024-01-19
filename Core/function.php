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

#[NoReturn] function abort($code): void
{
    http_response_code($code);
    redirect('/error');
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

#[NoReturn] function redirect(string $location): void
{
    header('location: ' . $location);
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}

function timeComparison($timestamp, $minutes): bool
{
    $timestamp = strtotime($timestamp);
    $currentTime = time();
    $differenceInMinutes = ($currentTime - $timestamp) / 60;

    return $differenceInMinutes > $minutes;
}

function verifyRecaptcha($token, $secretKey)
{
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secretKey,
        'response' => $token,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return json_decode($result, true);
}