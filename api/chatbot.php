<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/auth_model.php';
require_once __DIR__ . '/../controllers/api/chatbot_controller.php';

header('Content-Type: application/json');

if (!auth_check_session()) {
    echo json_encode(['error' => 'Not authenticated']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$message = $data['message'] ?? '';
$result = api_chatbot_respond($message);
echo json_encode($result);
