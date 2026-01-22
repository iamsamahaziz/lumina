<?php

require_once __DIR__ . '/../models/stats_model.php';
require_once __DIR__ . '/../models/task_model.php';
require_once __DIR__ . '/../models/reward_model.php';
require_once __DIR__ . '/../includes/functions.php';

function dashboard_prepare_data($conn, $user_id)
{
    $username = $_SESSION['username'];
    $stats = stats_get_user_stats($conn, $user_id);
    $themes = reward_get_themes($conn, $user_id);
    $darkUnlocked = in_array('Thème Sombre', $themes);
    $oceanUnlocked = in_array('Thème Océan', $themes);
    $badgeUnlocked = reward_check_badge_pro($conn, $user_id);
    $tasks = task_get_pending($conn, $user_id, 3);
    $affirmation = getRandomAffirmation();

    return [
        'username' => $username,
        'stats' => $stats,
        'darkUnlocked' => $darkUnlocked,
        'oceanUnlocked' => $oceanUnlocked,
        'badgeUnlocked' => $badgeUnlocked,
        'tasks' => $tasks,
        'affirmation' => $affirmation
    ];
}
