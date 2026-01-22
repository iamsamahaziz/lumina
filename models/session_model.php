<?php

function session_create($conn, $user_id, $duration, $type = 'pomodoro')
{
    $user_id = (int) $user_id;
    $duration = (int) $duration;
    $type = mysqli_real_escape_string($conn, $type);
    $coins = $duration;

   mysqli_query($conn, "INSERT INTO study_sessions (user_id, start_time, end_time, duration_minutes, session_type, coins_earned) 
    VALUES ($user_id, NOW(), DATE_ADD(NOW(), INTERVAL $duration MINUTE), $duration, '$type', $coins)");
    mysqli_query($conn, "UPDATE users SET coins = coins + $coins WHERE id=$user_id");
    return ['success' => true, 'coins' => $coins];
}

function session_get_by_user($conn, $user_id, $limit = 10)
{
    $user_id = (int) $user_id;
    $limit = (int) $limit;
    return mysqli_query($conn, "SELECT * FROM study_sessions WHERE user_id=$user_id ORDER BY start_time DESC LIMIT $limit");
}
