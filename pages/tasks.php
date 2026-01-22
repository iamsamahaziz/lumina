<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../controllers/tasks_controller.php';

auth_require_login();
$user_id = $_SESSION['user_id'];
tasks_handle_create($conn, $user_id);
tasks_handle_complete($conn, $user_id);
tasks_handle_delete($conn, $user_id);
$data = tasks_prepare_data($conn, $user_id);
extract($data);
require_once __DIR__ . '/../views/tasks_view.php';
