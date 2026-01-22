<?php

function reward_get_catalog()
{
    return [
        1 => ['name' => 'Thème Sombre', 'cost' => 50, 'icon' => '🌙', 'type' => 'theme'],
        2 => ['name' => 'Thème Océan', 'cost' => 100, 'icon' => '🌊', 'type' => 'theme'],
        3 => ['name' => 'Badge Pro', 'cost' => 200, 'icon' => '🏆', 'type' => 'badge']
    ];
}

function reward_get_unlocked($conn, $user_id)
{
    $user_id = (int) $user_id;
    $unlocked = [];
    $result = mysqli_query($conn, "SELECT reward_name FROM rewards WHERE user_id=$user_id");
    while ($r = mysqli_fetch_assoc($result))
        $unlocked[] = $r['reward_name'];
    return $unlocked;
}

function reward_get_themes($conn, $user_id)
{
    $user_id = (int) $user_id;
    $themes = [];
    $result = mysqli_query($conn, "SELECT reward_name FROM rewards WHERE user_id=$user_id AND reward_type='theme'");
    while ($r = mysqli_fetch_assoc($result))
        $themes[] = $r['reward_name'];
    return $themes;
}

function reward_check_unlocked($conn, $user_id, $reward_name)
{
    $user_id = (int) $user_id;
    $reward_name = mysqli_real_escape_string($conn, $reward_name);
    $result = mysqli_query($conn, "SELECT id FROM rewards WHERE user_id=$user_id AND reward_name='$reward_name'");
    return mysqli_num_rows($result) > 0;
}

function reward_check_badge_pro($conn, $user_id)
{
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT id FROM rewards WHERE user_id=$user_id AND reward_name='Badge Pro' AND unlocked=1");
    return mysqli_num_rows($result) > 0;
}

function reward_purchase($conn, $user_id, $item_id)
{
    $catalog = reward_get_catalog();
    if (!isset($catalog[$item_id]))
        return ['success' => false, 'message' => "Récompense inconnue."];

    $item = $catalog[$item_id];
    $user_id = (int) $user_id;

    if (reward_check_unlocked($conn, $user_id, $item['name'])) {
        return ['success' => false, 'message' => "Déjà débloqué !"];
    }

    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT coins FROM users WHERE id=$user_id"));
    if ($user['coins'] < $item['cost']) {
        return ['success' => false, 'message' => "Pas assez de pièces."];
    }

    mysqli_query($conn, "UPDATE users SET coins = coins - {$item['cost']} WHERE id=$user_id");
    mysqli_query($conn, "INSERT INTO rewards (user_id, reward_type, reward_name, cost_coins, unlocked, unlocked_at) VALUES ($user_id, '{$item['type']}', '{$item['name']}', {$item['cost']}, 1, NOW())");
    return ['success' => true, 'message' => "✅ Débloqué !"];
}
