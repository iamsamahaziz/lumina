<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../models/user_model.php';
require_once __DIR__ . '/../controllers/profile_controller.php';

auth_require_login();
$user_id = $_SESSION['user_id'];
profile_handle_delete($conn, $user_id);
$user = user_get_by_id($conn, $user_id);
$msg = profile_handle_update($conn, $user_id, $user['password_hash']);
$data = profile_prepare_data($conn, $user_id);
extract($data);
require_once __DIR__ . '/../views/profile_view.php';
