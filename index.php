<?php
require __DIR__.'/header.php';


if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
    ?>
    <table>
        <tr>
            <th>Nom du joueur</th>
            <td><?= $character->getName(); ?></td>
        </tr>
        <tr>
            <th>Point de vie</th>
            <td><?= $character->getHp(); ?></td>
        </tr>
        <tr>
            <th>Point d'action</th>
            <td><?= $character->getAp(); ?></td>
        </tr>
    </table>
    <?php

}

require __DIR__.'/footer.php';

?>