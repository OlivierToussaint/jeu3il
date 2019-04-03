<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use App\CharacterRepository;
use App\Character;

$base = new PDO('mysql:host=localhost;dbname=tp', 'tp', 'secret');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" >
        <title>Mon jeu</title>
    </head>
    <body>

<?php

if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
    if ($character->getState() === Character::DEAD) {
        echo "Vous êtes mort mais rien n'est fini pour vous !";
        $character->setHp($character->getHpMax());
        $characterRepository->update($character);
    }
}
include __DIR__.'/menu.php';
?>