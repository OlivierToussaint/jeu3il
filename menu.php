<nav class="menu">
<a href="index.php">Index</a>
<?php
if (isset($_SESSION['id'])) :?>
    <a href="deconnection.php">Déconnection</a>
<?php else: ?>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a>
<?php endif ?>

</nav>