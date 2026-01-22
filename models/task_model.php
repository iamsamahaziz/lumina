<?php

function task_create($conn, $user_id, $title, $priority = 'medium')
{
    $user_id = (int) $user_id;
    $title = mysqli_real_escape_string($conn, trim($title));
    $priority = mysqli_real_escape_string($conn, $priority);
    if ($title) {
        mysqli_query($conn, "INSERT INTO tasks (user_id, title, priority) VALUES ($user_id, '$title', '$priority')");
        return true;
    }
    return false;
}

function task_get_pending($conn, $user_id, $limit = null)
{
    $user_id = (int) $user_id;
    $sql = "SELECT * FROM tasks WHERE user_id=$user_id AND status='pending' ORDER BY CASE priority WHEN 'high' THEN 1 WHEN 'medium' THEN 2 WHEN 'low' THEN 3 END";
    if ($limit)
        $sql .= " LIMIT " . (int) $limit;
    return mysqli_query($conn, $sql);
}

function task_get_completed($conn, $user_id, $limit = 10)
{
    $user_id = (int) $user_id;
    $limit = (int) $limit;
    return mysqli_query($conn, "SELECT * FROM tasks WHERE user_id=$user_id AND status='completed' ORDER BY completed_at DESC LIMIT $limit");
}

function task_complete($conn, $task_id, $user_id)
{
    $task_id = (int) $task_id;
    $user_id = (int) $user_id;
    mysqli_query($conn, "UPDATE tasks SET status='completed', completed_at=NOW() WHERE id=$task_id AND user_id=$user_id");
}

function task_delete($conn, $task_id, $user_id)
{
    $task_id = (int) $task_id;
    $user_id = (int) $user_id;
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$task_id AND user_id=$user_id");
}

function task_get_stats($conn, $user_id)
{
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT COUNT(CASE WHEN status='pending' THEN 1 END) as pending, COUNT(CASE WHEN status='completed' THEN 1 END) as done FROM tasks WHERE user_id=$user_id");
    return mysqli_fetch_assoc($result);
}        
