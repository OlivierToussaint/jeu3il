<?php
require __DIR__.'/header.php';

$characters = null;
if (isset($_SESSION['id'])) {
    $characters = $characterRepository->findAllWithoutMe($_SESSION['id']);
}
echo $twig->render('index.html.twig', ['characters' => $characters]);


?>