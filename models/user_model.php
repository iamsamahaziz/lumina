<?php

function user_get_by_id($conn, $user_id)
{
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
    return mysqli_fetch_assoc($result);
}

function user_update_profile($conn, $user_id, $username, $email)
{
    $user_id = (int) $user_id;
    $username = mysqli_real_escape_string($conn, trim($username));
    $email = mysqli_real_escape_string($conn, trim($email));
    mysqli_query($conn, "UPDATE users SET username='$username', email='$email' WHERE id=$user_id");
    $_SESSION['username'] = $username;
    return true;
}

function user_update_password($conn, $user_id, $current_pass, $new_pass, $confirm_pass, $current_hash)
{
    if (!password_verify($current_pass, $current_hash)) {
        return ['success' => false, 'error' => "❌ Mot de passe actuel incorrect."];
    }
    if ($new_pass !== $confirm_pass) {
        return ['success' => false, 'error' => "❌ Les mots de passe ne correspondent pas."];
    }
    if (strlen($new_pass) < 6) {
        return ['success' => false, 'error' => "❌ Le mot de passe doit avoir au moins 6 caractères."];
    }
    $user_id = (int) $user_id;
    $hash = password_hash($new_pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE users SET password_hash='$hash' WHERE id=$user_id");
    return ['success' => true, 'error' => null];
}

function user_delete($conn, $user_id)
{
    $user_id = (int) $user_id;
    mysqli_query($conn, "DELETE FROM users WHERE id=$user_id");
    session_destroy();
}

function user_add_coins($conn, $user_id, $amount)
{
    $user_id = (int) $user_id;
    $amount = (int) $amount;
    mysqli_query($conn, "UPDATE users SET coins = coins + $amount WHERE id=$user_id");
}

function user_remove_coins($conn, $user_id, $amount)
{
    $user_id = (int) $user_id;
    $amount = (int) $amount;
    mysqli_query($conn, "UPDATE users SET coins = coins - $amount WHERE id=$user_id");
}
