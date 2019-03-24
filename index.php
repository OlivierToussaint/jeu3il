<?php
require __DIR__.'/header.php';


if (isset($_SESSION['id'])) {

    $listOfCharacter = $characterRepository->findAllWithoutMe($_SESSION['id']);
    foreach ($listOfCharacter as $character):?>
        <a href="attaque.php?id=<?= $character->getId();?>"><?= $character->getName();?></a><br>
    <?php endforeach;
}

require __DIR__.'/footer.php';

?>