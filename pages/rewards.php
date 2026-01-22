<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../controllers/rewards_controller.php';

auth_require_login();
$user_id = $_SESSION['user_id'];
$msg = rewards_handle_purchase($conn, $user_id);
$data = rewards_prepare_data($conn, $user_id);
extract($data);
require_once __DIR__ . '/../views/rewards_view.php';
