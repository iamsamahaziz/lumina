<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../controllers/dashboard_controller.php';

auth_require_login();
$user_id = $_SESSION['user_id'];
$data = dashboard_prepare_data($conn, $user_id);
extract($data);
require_once __DIR__ . '/../views/dashboard_view.php';
