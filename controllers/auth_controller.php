<?php

require_once __DIR__ . '/../models/auth_model.php';

function auth_handle_login($conn)
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        return '';

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $result = auth_login($conn, $email, $password);

    if ($result['success']) {
        header("Location: dashboard.php");
        exit();
    }
    return $result['error'];
}

function auth_handle_register($conn)
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        return ['error' => '', 'success' => ''];

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    $result = auth_register($conn, $username, $email, $password, $confirm);

    if ($result['success'])
        return ['error' => '', 'success' => "Compte créé ! Vous pouvez vous connecter."];
    return ['error' => $result['error'], 'success' => ''];
}
