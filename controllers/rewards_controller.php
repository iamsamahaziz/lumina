<?php

require_once __DIR__ . '/../models/reward_model.php';
require_once __DIR__ . '/../models/user_model.php';

function rewards_handle_purchase($conn, $user_id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
        $item_id = (int) $_POST['buy'];
        $result = reward_purchase($conn, $user_id, $item_id);
        return $result['message'];
    }
    return '';
}

function rewards_prepare_data($conn, $user_id)
{
    $user = user_get_by_id($conn, $user_id);
    $catalog = reward_get_catalog();
    $unlocked = reward_get_unlocked($conn, $user_id);

    return [
        'user' => $user,
        'catalog' => $catalog,
        'unlocked' => $unlocked,
        'darkUnlocked' => in_array('Thème Sombre', $unlocked),
        'oceanUnlocked' => in_array('Thème Océan', $unlocked)
    ];
}
