<?php

function getRandomAffirmation()
{
    $affirmations = [
        "Tu es capable de tout !",
        "Chaque minute compte.",
        "Un pas à la fois.",
        "Tu fais du super travail !",
        "Continue comme ça !"
    ];
    return $affirmations[array_rand($affirmations)];
}
