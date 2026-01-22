<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../controllers/auth_controller.php';

$result = auth_handle_register($conn);
$error = $result['error'];
$success = $result['success'];
require_once __DIR__ . '/../views/register_view.php';
