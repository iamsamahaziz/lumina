<?php

function chatbot_get_response($message)
{
    $message = strtolower(trim($message));
    $responses = [
        'aide' => "Commandes: 'stats', 'motivation', 'conseils', 'pomodoro'",
        'stats' => "Va dans ton profil pour voir tes statistiques ! 📊",
        'motivation' => "Tu es capable de tout ! Continue comme ça ! 💪",
        'conseils' => "Conseil: Fais des pauses régulières de 5 min toutes les 25 minutes.",
        'pomodoro' => "La technique Pomodoro: 25 min de focus + 5 min de pause. Répète 4 fois puis longue pause de 15 min.",
        'bonjour' => "Salut ! Comment puis-je t'aider ? 👋",
        'merci' => "De rien ! Bonne étude ! 📚"
    ];
    foreach ($responses as $keyword => $reply) {
        if (strpos($message, $keyword) !== false)
            return $reply;
    }
    return "Je ne comprends pas. Tape 'aide' pour voir les commandes.";
}
