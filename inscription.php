<?php
require __DIR__.'/header.php';

use App\Character;
use App\CharacterRepository;

if (isset($_POST['name']) && isset($_POST['password'])) {

    $character = new Character([
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_ARGON2I),
            'hp' => '100',
            'ap' => '10'
    ]);

    $characterRepository = new CharacterRepository($base);
    if ($characterRepository->exists($character) === false) {
        $characterRepository->add($character);
        echo "Votre personnage est bien créé";
    } else {
        echo "Un personnage du même nom existe";
    }
}

echo $twig->render('inscription.html.twig');

?>

