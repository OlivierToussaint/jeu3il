<?php
require __DIR__.'/header.php';


if (isset($_SESSION['id'])) {

    $listOfCharacter = $characterRepository->findAllWithoutMe($_SESSION['id']);
    foreach ($listOfCharacter as $character):?>
        <?= $character->getName();?> : Action disponible <a href="attaque.php?id=<?= $character->getId();?>">Attaque</a> - <a href="heal.php?id=<?= $character->getId();?>">Soin</a><br>
    <?php endforeach;
}

require __DIR__.'/footer.php';

?>