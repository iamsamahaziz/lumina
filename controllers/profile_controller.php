<?php

require_once __DIR__ . '/../models/user_model.php';
require_once __DIR__ . '/../models/stats_model.php';
require_once __DIR__ . '/../models/reward_model.php';

function profile_handle_delete($conn, $user_id)
{
    if (isset($_POST['delete_account'])) {
        user_delete($conn, $user_id);
        header("Location: login.php");
        exit();
    }
}

function profile_handle_update($conn, $user_id, $current_password_hash)
{
    $msg = '';
    if (isset($_POST['update_profile'])) {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        user_update_profile($conn, $user_id, $username, $email);
        $msg = "✅ Profil mis à jour !";

        if (!empty($_POST['new_pass']) && !empty($_POST['current_pass'])) {
            $result = user_update_password($conn, $user_id, $_POST['current_pass'], $_POST['new_pass'], $_POST['confirm_pass'] ?? '', $current_password_hash);
            $msg = $result['success'] ? "✅ Mot de passe modifié !" : $result['error'];
        }
    }
    return $msg;
}

function profile_prepare_data($conn, $user_id)
{
    $user = user_get_by_id($conn, $user_id);
    $stats = stats_get_user_stats($conn, $user_id);
    $themes = reward_get_themes($conn, $user_id);
    $darkUnlocked = in_array('Thème Sombre', $themes);
    $oceanUnlocked = in_array('Thème Océan', $themes);
    $badgeUnlocked = reward_check_badge_pro($conn, $user_id);

    return [
        'user' => $user,
        'stats' => $stats,
        'darkUnlocked' => $darkUnlocked,
        'oceanUnlocked' => $oceanUnlocked,
        'badgeUnlocked' => $badgeUnlocked
    ];
}
