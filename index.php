<?php
require __DIR__.'/header.php';

$character = new Character(['name' => 'Olivier', 'hp' => '100', 'ap' => '10']);

echo "Le nom du joueur est " . $character->getName() . " et à " . $character->getHp() . " point de vie";
?>