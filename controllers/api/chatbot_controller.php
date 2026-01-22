<?php

require_once __DIR__ . '/../../models/chatbot_model.php';

function api_chatbot_respond($message)
{
    return ['response' => chatbot_get_response($message)];
}
