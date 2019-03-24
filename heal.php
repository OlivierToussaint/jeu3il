<?php
require __DIR__.'/header.php';

if (isset($_SESSION['id'])) {

    $characterRepository = new CharacterRepository($base);
    $myCharacter = $characterRepository->find($_SESSION['id']);
    $friend = $characterRepository->find($_GET['id']);

    if ($friend->getState() === Character::DEAD) {
        echo "Vous venez de découvrir un corps sans vie ...";
    } else {
        if ($myCharacter->getAp() >= Character::HEAL_COST) {

            // Point d'action
            $myCharacter->setAp($myCharacter->getAp() - Character::HEAL_COST);
            $myCharacter->addExperience(50);

            // Heal
            $heal = rand(1,50);
            $hp = $friend->getHp() + $heal;
            $friend->setHp($hp);

            $message = $myCharacter->getName() . " soigne ". $friend->getName(). " pour " . $heal ." de soins <br>";

            echo $message;

            // J'enregistre les logs dans chaques journal
            $characterLogRepository = new CharacterLogRepository($base);
            $characterLogRepository->add($myCharacter, $message);
            $characterLogRepository->add($friend, $message);

            $characterRepository->update($myCharacter);
            $characterRepository->update($friend);

        } else {
            echo "Vous n'avez pas assez de point d'action";
        }
    }
}

require __DIR__.'/footer.php';

?>