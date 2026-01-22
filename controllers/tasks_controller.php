<?php

require_once __DIR__ . '/../models/task_model.php';
require_once __DIR__ . '/../models/reward_model.php';

function tasks_handle_create($conn, $user_id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
        $title = $_POST['title'] ?? '';
        $priority = $_POST['priority'] ?? 'medium';
        if (task_create($conn, $user_id, $title, $priority)) {
            header("Location: tasks.php");
            exit();
        }
    }
}

function tasks_handle_complete($conn, $user_id)
{
    if (isset($_GET['complete_id'])) {
        $id = (int) $_GET['complete_id'];
        task_complete($conn, $id, $user_id);
        header("Location: tasks.php");
        exit();
    }
}

function tasks_handle_delete($conn, $user_id)
{
    if (isset($_GET['delete_id'])) {
        $id = (int) $_GET['delete_id'];
        task_delete($conn, $id, $user_id);
        header("Location: tasks.php");
        exit();
    }
}

function tasks_prepare_data($conn, $user_id)
{
    $themes = reward_get_themes($conn, $user_id);
    $darkUnlocked = in_array('Thème Sombre', $themes);
    $oceanUnlocked = in_array('Thème Océan', $themes);
    $pending = task_get_pending($conn, $user_id);
    $completed = task_get_completed($conn, $user_id, 10);
    $stats = task_get_stats($conn, $user_id);

    return [
        'darkUnlocked' => $darkUnlocked,
        'oceanUnlocked' => $oceanUnlocked,
        'pending' => $pending,
        'completed' => $completed,
        'stats' => $stats
    ];
}
