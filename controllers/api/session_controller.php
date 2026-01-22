<?php

require_once __DIR__ . '/../../models/session_model.php';
require_once __DIR__ . '/../../models/auth_model.php';

function api_session_create($conn, $user_id, $data)
{
    $duration = (int) ($data['duration'] ?? 25);
    $type = $data['type'] ?? 'pomodoro';
    return session_create($conn, $user_id, $duration, $type);
}
