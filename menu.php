<nav class="menu">
    <a href="index.php">Index</a>
    <?php
    if (isset($_SESSION['id'])) :?>
        <a href="journal.php">Journal</a>
        <a href="deconnection.php">Déconnection</a>
    <?php else: ?>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    <?php endif ?>

    <?php if (isset($_SESSION['id'])) : ?>
        <div>
            HP : <?= $character->getHp(); ?> / <?= $character->getHpMax(); ?>, AP : <?= $character->getAp(); ?>,
            EXP : <?= $character->getExperience(); ?>, LVL : <?= $character->getLevel(); ?>
        </div>
    <?php endif ?>

</nav>

