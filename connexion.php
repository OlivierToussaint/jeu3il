<?php
require __DIR__.'/header.php';
use App\CharacterRepository;

if (isset($_POST['name']) && isset($_POST['password'])) {

    $characterRepository = new CharacterRepository($base);
    if ($characterRepository->login($_POST['name'], $_POST['password'])) {
        header('Location: index.php');
    } else {
        echo "Ce personnage n'existe pas";
    }
}

if (isset($_SESSION['id'])) {
    header('Location: index.php');

} else {
    echo $twig->render('connexion.html.twig');

}
?>

