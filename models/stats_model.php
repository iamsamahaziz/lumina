<?php

function stats_get_user_stats($conn, $user_id)
{
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT * FROM user_stats WHERE id = $user_id");
    $stats = mysqli_fetch_assoc($result);
    if (!$stats) {
        return ['today_minutes' => 0, 'week_minutes' => 0, 'coins' => 0, 'completed_tasks' => 0, 'total_minutes' => 0, 'total_sessions' => 0];
    }
    return $stats;
}

function stats_get_today($conn, $user_id)
{
    $stats = stats_get_user_stats($conn, $user_id);
    return ['minutes' => $stats['today_minutes'] ?? 0, 'sessions' => $stats['today_sessions'] ?? 0];
}

function stats_get_week($conn, $user_id)
{
    $stats = stats_get_user_stats($conn, $user_id);
    return ['minutes' => $stats['week_minutes'] ?? 0];
}
