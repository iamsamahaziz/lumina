<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../controllers/auth_controller.php';

$error = auth_handle_login($conn);
require_once __DIR__ . '/../views/login_view.php';
