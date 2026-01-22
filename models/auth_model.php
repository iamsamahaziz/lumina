<?php

function auth_check_session()
{
    return isset($_SESSION['user_id']);
}

function auth_require_login()
{
    if (!auth_check_session()) {
        header("Location: login.php");
        exit();
    }
}

function auth_login($conn, $email, $password)
{
    $email = mysqli_real_escape_string($conn, trim($email));
    $result = mysqli_query($conn, "SELECT id, username, password_hash FROM users WHERE email='$email'");

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return ['success' => true, 'user' => $user, 'error' => null];
        }
    }
    return ['success' => false, 'user' => null, 'error' => "Email ou mot de passe incorrect."];
}

function auth_register($conn, $username, $email, $password, $confirm)
{
    $username = mysqli_real_escape_string($conn, trim($username));
    $email = mysqli_real_escape_string($conn, trim($email));

    if ($password !== $confirm) {
        return ['success' => false, 'error' => "Les mots de passe ne correspondent pas."];
    }
    if (strlen($password) < 6) {
        return ['success' => false, 'error' => "Le mot de passe doit avoir au moins 6 caractères."];
    }

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' OR username='$username'");
    if (mysqli_num_rows($check) > 0) {
        return ['success' => false, 'error' => "Email ou nom d'utilisateur déjà utilisé."];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hash')");
    return ['success' => true, 'error' => null];
}

function auth_logout()
{
    session_destroy();
    header("Location: login.php");
    exit();
}
