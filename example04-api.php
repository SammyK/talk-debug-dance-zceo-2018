<?php

$method = $_SERVER['REQUEST_METHOD'] ?? null;
if ('POST' !== $method) {
    header('405 Method Not Allowed', true, 405);
    die('Oops! Method not allowed. Try POST.'.PHP_EOL);
}

$email = $_POST['email'] ?? null;
$password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;
$rememberMe = $_POST['remember_me'] ?? false;

echo json_encode(
    [
        'data' => [
            'email' => $email,
            'password' => $password,
            'remember_me' => $rememberMe,
        ],
    ],
    JSON_PRETTY_PRINT
);
