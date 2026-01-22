<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../controllers/api/session_controller.php';

header('Content-Type: application/json');

if (!auth_check_session()) {
    echo json_encode(['error' => 'Not authenticated']);
    exit();
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);
$result = api_session_create($conn, $user_id, $data);
echo json_encode($result);
